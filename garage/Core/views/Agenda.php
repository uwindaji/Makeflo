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
                $_SESSION['car'][1] == "Audi" || 
                $_SESSION['car'][1] == "Bmw" || 
                $_SESSION['car'][1] == "Citroen" || 
                $_SESSION['car'][1] == "Fiat" || 
                $_SESSION['car'][1] == "Ford" || 
                $_SESSION['car'][1] == "Mercedes" ||
                $_SESSION['car'][1] == "Opel" ||
                $_SESSION['car'][1] == "Peugeot" ||
                $_SESSION['car'][1] == "Renault" ||
                $_SESSION['car'][1] == "Volkswagen"  )
            {
                    echo $_SESSION['car'][1];
            }else {

                echo "Default";
            }
                    
                    
                ?>.jpg" alt="Card image cap">
                
        <div class="card-body">
            <h5 class="card-title">Mark : <?= $_SESSION['car'][1] ?></h5>
            <h6 class="card-title">Model : <?= $_SESSION['car'][2] ?></h6>
            <h6 class="card-title">Register number : <?= $_SESSION['car'][3] ?></h6>
            <h6 class="card-title">Kilometers : <?= $_SESSION['car'][4] ?></h6>
            <h6 class="card-title">Month : <?= $_SESSION['car'][5] ?></h6>
            <h6 class="card-title">Year : <?= $_SESSION['car'][6] ?></h6>
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
                <?php if($i === 0): ?>
                    <tr>
                        <?php foreach($month->days as $k => $day): 

                            $date =(clone $start_day)->modify("+" . ($k + $i * 7) . " days");
                            
                        ?>
                        <td >
                            
                                <div class="week-day"><?= $day; ?></div>
                            
                        </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endif; ?>
                <tr>
                    <?php foreach($month->days as $k => $day): 

                        $date =(clone $start_day)->modify("+" . ($k + $i * 7) . " days");
                        
                    ?>
                    <td>
                        <div <?php  if (strtotime(date('d-m-Y')) <= strtotime($date->format('d-m-Y'))){ ?> data-toggle="modal" data-target="#exampleModal" <?php } ?>  class="d-flex justify-content-between  <?= $month->withinMonth($date) ? 'day' : 'other-month'; ?>  
                                                                                    <?= $day == "Sun" || $day == "Sat" ? 'weekend' : ''; ?> 
                                                                                    <?= date('Y-d-m') == $date->format('Y-d-m') ? 'today' : ''; ?> 
                                                                                    <?= $day == "Sun" || $day == "Sat" ? 'remove' : '' ?> 
                                                                                    <?= strtotime(date('d-m-Y')) > strtotime($date->format('d-m-Y'))? 'remove' : '' ?>" 
                                                                                    onclick="getDate('<?= $date->format('Y-m-d'); ?>')">
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <form action="" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" id="date" name="date" disabled>
                    </div>
                    <div class="form-group ">
                        <select class="form-control" id="select" name="app">
                        </select>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn">Take</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

