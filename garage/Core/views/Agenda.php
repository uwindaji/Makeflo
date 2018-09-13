<div class="row row-agenda-head pt-3 pb-3">
    <div class="col-lg-1 col-xm-0"></div>
    <div class="card col-lg-10 col-xm-12 pt-3 pb-3">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam vero 
        similique maxime quis sit ducimus dignissimos praesentium ratione 
        incidunt nesciunt itaque repellendus, vel suscipit molestiae aliquid 
        delectus molestias recusandae cumque?
    </div>
    <div class="col-lg-1 col-xm-0"></div>
</div>


<div class="row row-agenda d-flex justify-content-wrap">
    <div class="col-lg-1 col-xm-0"></div>
    <div class="card col-lg-3 col-xm-12 p-0 mt-3 mb-3">
        <img class="card-img-top" src="./img/<?php
        if (    
                $_SESSION['mark'] == "Audi" || 
                $_SESSION['mark'] == "Bmw" || 
                $_SESSION['mark'] == "Citroen" || 
                $_SESSION['mark'] == "Fiat" || 
                $_SESSION['mark'] == "Ford" || 
                $_SESSION['mark'] == "Mercedes" ||
                $_SESSION['mark'] == "Opel" ||
                $_SESSION['mark'] == "Peugeot" ||
                $_SESSION['mark'] == "Renault" ||
                $_SESSION['mark'] == "Volkswagen"  )
            {
                    echo $_SESSION['mark'];
            }else {

                echo "Default";
            }
                    
                    
                ?>.jpg" alt="Card image cap">
                
        <div class="card-body">
            <h5 class="card-title">Mark : <?= $_SESSION['mark'] ?></h5>
            <h6 class="card-title">Model : <?= $_SESSION['model'] ?></h6>
            <h6 class="card-title">Register number : <?= $_SESSION['register_number'] ?></h6>
            <h6 class="card-title">Kilometers : <?= $_SESSION['kilometers'] ?></h6>
            <h6 class="card-title">Month : <?= $_SESSION['m'] ?></h6>
            <h6 class="card-title">Year : <?= $_SESSION['y'] ?></h6>
        </div>
    </div>
    <div class="col-lg-1 col-xm-0"></div>
    <div class="col-lg-6 col-xm-12 agenda m-0 mt-3 mb-3">
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