<?php

namespace AppBundle\Twig;

class TotalMinutesOnDayExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
        new \Twig_SimpleFunction('getTotalMinutesOnDay', array($this, 'getTotalMinutesOnDay')),
    ];
    }

  /**
   * Returns the total minutes of an schedule entry on a specific day.
   *
   * Example 1:
   * $begin = 03.01.2000 01:00:00
   * $end   = 07.01.2000 15:00:00
   * $day   = 05.01.2000 (time is ignored)
   *
   * The schedule will be on 05.01.2000 from 00:00 to 23:59, so it returns 1439 (minutes).
   *
   * Example 2:
   * $begin = 01.01.2000 03:00:00
   * $end   = 01.01.2000 16:00:00
   * $day   = 01.01.2000 (time is ignored)
   *
   * The schedule will be on 01.01.2000 from 03:00 to 16:00, so it returns 780 (minutes).
   *
   * Example 3:
   * $begin = 01.01.2000 01:00:00
   * $end   = 03.01.2000 05:00:00
   * $day   = 07.01.2000 (time is ignored)
   *
   * The schedule will NOT be on 07.01.2000, so it returns 0 (minutes).
   *
   * @param \DateTime $begin
   * @param \DateTime $end
   * @param \DateTime $day
   *
   * @return float
   */
  public function getTotalMinutesOnDay(\DateTime $begin, \DateTime $end, \DateTime $day)
  {
      // Important: Set $day to 00:00:00
    $day->setTime(0, 0, 0);

    // Prepare dates
    $beginDate = $begin->format('Y-m-d');
      $endDate = $end->format('Y-m-d');
      $dayDate = $day->format('Y-m-d');

    // Return 0 if $day is not on a day between $begin or $end (time is ignored)
    if ($day->getTimestamp() < strtotime($beginDate)
        || $day->getTimestamp() >= (strtotime($endDate) + 86400)) {
        return 0;
    }

    // Fix $begin if $begin is not on day of $day
    if ($dayDate !== $beginDate) {
        $begin = new \DateTime($day);
    }

    // Fix $end if $end is not on day of $day
    if ($dayDate !== $endDate) {
        $end = \DateTime::createFromFormat('Y-m-d H:i:s', $dayDate.' 23:59:59');
    }

    // Calculate total minutes
    $totalMinutes = round(abs($end->getTimestamp() - $begin->getTimestamp()) / 60, 2);

      dump($totalMinutes);

      return $totalMinutes;
  }

    public function getName()
    {
        return 'app_total_minutes_on_day_extension';
    }
}
