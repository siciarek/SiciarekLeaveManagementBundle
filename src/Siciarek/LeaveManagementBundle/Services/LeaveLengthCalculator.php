<?php
namespace Siciarek\LeaveManagementBundle\Services;

use Doctrine\Common\Cache\FileCache;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DomCrawler\Crawler;

class LeaveLengthCalculator
{

    /**
     * @var EntityManager
     */
    public $em;
    public $container;

    public function isWorkingDay(\DateTime $day)
    {
        if (!(!in_array($day->format('N'), array(6, 7)) and $this->isFree($day) === false)) {
            return false;
        }

        return true;
    }

    public function calculate(\DateTime $start, \DateTime $end)
    {
        $start = clone($start);
        $end = clone($end);

        $length = array(
            'abs'          => 0,
            'working_days' => 0,
        );

        do {
            $length['abs']++;

            if ($this->isWorkingDay($start) == true) {
                $length['working_days']++;
            }

            $start->add(new \DateInterval('PT24H'));
        } while ($start <= $end);

        return $length;
    }

    public function isFree(\DateTime $day) {
        $year = $day->format('Y');

        $free_days = $this->getFreeDays($year);

        return array_key_exists($year, $free_days);
    }


    /**
     * @param $year
     * @return array
     */
    public function getFreeDays($year) {

        $cacheDir = $this->container->get('kernel')->getCacheDir();

        $directory    = $cacheDir .DIRECTORY_SEPARATOR . 'slm';
        $extension    = ".cache";
        $driver = new \Doctrine\Common\Cache\FilesystemCache($directory, $extension);

        $cacheKey = 'free_days_' . $year;
        $free_days = array();

        if($driver->contains($cacheKey)) {
            $free_days = $driver->fetch($cacheKey);
        }

        if($free_days === array()) {
            $temp = $this->getFreeDaysFromInternet($year);
            $driver->save($cacheKey, $temp);
        }

        $free_days = $driver->fetch($cacheKey);

        return $free_days;
    }

    /**
     * @param $year
     * @return array
     */
    protected function getFreeDaysFromInternet($year)
    {
        $url = sprintf('http://www.kalendarzswiat.pl/swieta/wolne_od_pracy/%s', $year);

        $cr = new Crawler(file_get_contents($url));

        $nodeValues = $cr->filter('table.tab_easy:first-child tr td')->each(function (Crawler $node, $i) {
            return $node->text();
        });

        $key = null;

        $rx = array(
            'in'  => array(
                '/stycznia/',
                '/lutego/',
                '/marca/',
                '/kwietnia/',
                '/maja/',
                '/czerwca/',
                '/lipca/',
                '/sierpnia/',
                '/września/',
                '/października/',
                '/listopada/',
                '/grudnia/',
            ),
            'out' => range(1, 12),
        );

        $exceptions = array();

        foreach ($nodeValues as $elem) {
            if (preg_match('/^\s+/', $elem)) {

                $temp = trim($elem);
                list($day, $month) = explode(' ', $temp);

                $month = preg_replace($rx['in'], $rx['out'], $month);

                $key = sprintf('%d-%02d-%02d', $year, $month, $day);
                continue;
            }
            $exceptions[$key] = trim($elem);
        }

        return $exceptions;
    }

}
