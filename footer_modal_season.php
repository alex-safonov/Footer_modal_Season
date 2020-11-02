<style type="text/css">
    .poll-modal.modal.fade .modal-dialog {margin-top:10%}
    .poll-modal .modal-content h3 {margin-bottom: 50px}
    /*.poll-modal .btn {margin: 10px}*/
    .poll-modal .btn_not {background-color: #d3d3d3}
    p.footer_modal_award {
        margin-bottom: 32px; 
        margin-top: 10px; 
        font-size: 16px;
		line-height: 24px;
		text-align: center;
		letter-spacing: 0.25px;
		color: #58646A;
	}
	p.footer_modal_award_info {
		margin-bottom: 32px; 
		font-size: 14px;
		line-height: 20px;
		text-align: center;
		letter-spacing: 0.15px;
		color: #7B878F;
	}
</style>

<script>
    $(document).ready(function () {
        $('.poll-modal').modal()
    });
</script>

<?
$year_for_season = date("Y");
$date_today = strtotime (date("d.m.Y"));
// echo $date_today;

$leap_year = 28;
if ($year_for_season == 2020 || 2024 || 2028 || 2032 || 2036) {
	$leap_year = 29;
}
// echo $leap_year;

$start_winter = strtotime("01.12.".($year_for_season -1));
// echo $start_winter;
$end_winter = strtotime("$leap_year.02.$year_for_season");
// echo $end_winter;

$start_spring = strtotime("01.03.".$year_for_season);
// echo $start_spring;
$end_spring = strtotime("31.05.$year_for_season");
// echo $end_spring;

$start_summer = strtotime("01.06.".$year_for_season);
// echo $start_summer;
$end_summer = strtotime("31.08.$year_for_season");
// echo $end_summer;

$start_autumn = strtotime("01.09.".$year_for_season);
// echo $start_autumn;
$end_autumn = strtotime("30.11.$year_for_season");
// echo $end_autumn;


if(($start_winter <= $date_today && $date_today <= $end_winter)){
        //echo 'Winter!';
        $season_now = "s1";        
}
if(($start_spring <= $date_today && $date_today <= $end_spring)){
        //echo 'Spring!';
        $season_now = "s2";
}
if(($start_summer <= $date_today && $date_today <= $end_summer)){
        //echo 'Summer!';
        $season_now = "s3";
}
if(($start_autumn <= $date_today) && ($date_today <= $end_autumn)){
        //echo 'Autumn!';
        $season_now = "s4";
        // echo $season_now;
}

$array_data = explode(";", $curVol->GetData()['PROPS']['ACHIEVE_HERO_SEASON']['VALUE']);
// print_r(end($array_data));
				// foreach ($array_data as $key => $value_main) {
					 $array_data_season[$key] = explode(",", end($array_data));
 // print_r($array_data_season);

					// } 
				foreach ($array_data_season as $key => $value) {

				switch ($value[1]) {
			    case s1:
			        $season_modal_1 = "зимы";
			        $season_modal_2 = "этой зимой";
			        break;
			    case s2:
			        $season_modal_1 = "весны";
			        $season_modal_2 = "этой весной";
			        break;
			    case s3:
			        $season_modal_1 = "лета";
			        $season_modal_2 = "этим летом";
			        break;
			    case s4:
			        $season_modal_1 = "осени";
			        $season_modal_2 = "этой осенью";
			        break;
				}}

// echo 'SEASON_'.$season_now.'_'.$year_for_season.'';

//if (!isset($_COOKIE['SEASON_'.$season_now.'_'.$year_for_season.'']))   
//{   
//setcookie('SEASON_'.$season_now.'_'.$year_for_season.'',1,time()+31556926, '/');
?>

<? if (($year_for_season == $value[0]) && ($season_now == $value[1])) { 

	// if (!isset($_COOKIE['SEASON_'.$season_now.'_'.$year_for_season.'']))   
	// 	{   
	// 	setcookie('SEASON_'.$season_now.'_'.$year_for_season.'',1,time()+31556926, '/'); 
?> 

<div class="modal fade poll-modal" tabindex="-1" role="dialog"
     aria-labelledby="poll-modal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content align-center">

        	<img src="/upload/medialibrary/ACHIEVE_HERO_SEASON.svg">

            <p class="footer_modal_award">Привет, <?= $curVol->GetData()['PROPS']['NAME']['VALUE'] ?>!  <br>
            <!-- <p class="footer_modal_award">Привет, <? print_r($curVol->GetData()['PROPS']['ACHIEVE_HERO_SEASON']['VALUE']) ?>!  <br> -->
	        Ты можешь получить бейдж «Герой <?=$season_modal_1?>-<?=$year_for_season?>», если <?=$season_modal_2?> успешно выполнишь <?=$value[3]?> заданий для благотворительных фондов.</p>

			<p class="footer_modal_award_info">Готов стать героем?</p>

            <button type="button" class="btn " data-dismiss="modal" aria-hidden="true">Да!</button>
        </div>
    </div>
</div>
	<? //} ?>
<? } ?>

<!-- Вот такой надо: 
Эльза, ты можешь получить бейдж «Герой лета 2020», если этим летом успешно выполнишь 100500 заданий для благотворительных фондов. Готов стать героем?

Кнопка: Да! -->

<!-- Текущие: Герой сезона -->
				
