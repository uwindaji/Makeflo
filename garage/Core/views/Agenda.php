<div class="row row-agenda">
    <div class="col-lg-1 col-xm-0"></div>
    <div class="col-lg-6 col-xm-12 ">


    </div>
    <div class="col-lg-6 col-xm-12 agenda">
        <div class="agenda-head d-flex justify-content-between">
            <a href="?rec=Agenda&month=<?= $month->previousMonth()->_month ?>&year=<?= $month->previousMonth()->_year ?>" class="btn pl-3 m-0">&lt;</a>
            <h4 class="m-0" ><?= $month->toString(); ?></h4>
            <a href="?rec=Agenda&month=<?= $month->nextMonth()->_month ?>&year=<?= $month->nextMonth()->_year ?>" class="btn pr-3 m-0">&gt;</a>
        </div>
        <table class="calend">
            <?php  for($i = 0; $i < $month->getWeeks(); $i++ ):   ?>

                <tr>
                    <?php foreach($month->days as $k => $day): 

                        $date =(clone $start_day)->modify("+" . ($k + $i * 7) . " days");
                        
                    ?>
                    <td class="">
                        <?php if($i === 0): ?>
                            <div class="week-day"><?= $day; ?></div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between day <?= $month->withinMonth($date) ? '' : 'other-month'; ?> <?= $day == "Sun" || $day == "Sat" ? 'weekend' : ''; ?> <?= date('Y-d-m') == $date->format('Y-d-m') ? 'today' : ''; ?>">
                            <?= $date->format('d'); ?> 
                            <div class="<?= $day == "Sun" || $day == "Sat" ? 'red' : 'green'; ?>"></div>
                        </div>

                    </td>
                    <?php endforeach; ?>
                </tr>

            <?php  endfor;  ?>
        </table>
        <div class="agenda-footer d-flex justify-content-end">
            <span class="mr-3">Free: </span><div class="green"></div> <span class="ml-5 mr-3">Taken :</span><div class="red"></div>
        </div>
    </div>
    <div class="col-lg-1 col-xm-0"></div>
</div>