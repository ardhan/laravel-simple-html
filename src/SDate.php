<?php
namespace Ardhan\LaravelSimpleHtml;
use Carbon\Carbon;
class SDate{
    public static function interval_today($time){
        $date = Carbon::parse($time);
        $now = Carbon::now();
        $diff = $date->diffInDays($now);
        return $diff;
    }

    public static function interval_date($time1, $time2){
        $date1 = Carbon::parse($time1);
        $date2 = Carbon::parse($time2);
        $diff = $date1->diffInDays($date2);
        return $diff;
    }

    public static function format_datepicker($tx_date){
        if($tx_date != ""){
            return Carbon::createFromFormat('Y-m-d',$tx_date)->format('d/m/Y');
        }else{
            return "";
        }
    }

    public static function format_date_time($tx_date){
        if(($tx_date != "") && (!is_null($tx_date))){
            $times = explode(" ", $tx_date);
            $adate = $times[0];
            $clock = $times[1];
            return Carbon::createFromFormat('Y-m-d',$adate)->format('d/m/Y').' '.$clock;
        }else{
            return "";
        }
    }

    public static function format_date_time_picker($tx_date){
        if(($tx_date != "") && (!is_null($tx_date))){
            $times = explode(" ", $tx_date);
            $adate = $times[0];
            $clock = $times[1];
            $clocks = explode(":", $times[1]);
            return Carbon::createFromFormat('Y-m-d',$adate)->format('d/m/Y').' '.$clocks[0].":".$clocks[1];
        }else{
            return "";
        }
    }

    public static function format_date_time_calendar($tx_date){
        if(($tx_date != "") && (!is_null($tx_date))){
            $times = explode(" ", $tx_date);
            $adate = $times[0];
            $clock = $times[1];
            return Carbon::createFromFormat('d/m/Y',$adate)->format('Y-m-d').'T'.$clock.':00';
        }else{
            return "";
        }
    }

    public static function format_date_time_calendar3($tx_date){
        if(($tx_date != "") && (!is_null($tx_date))){
            $times = explode(" ", $tx_date);
            $adate = $times[0];
            $clock = $times[1];
            return Carbon::createFromFormat('d/m/Y',$adate)->format('Y-m-d').' '.$clock.':00';
        }else{
            return "";
        }
    }

    public static function format_date_time_calendar2($tx_date){
        if(($tx_date != "") && (!is_null($tx_date))){
            $times = explode(" ", $tx_date);
            $adate = $times[0];
            $clock = $times[1];
            return Carbon::createFromFormat('Y-m-d',$adate)->format('Y-m-d').'T'.$clock;
        }else{
            return "";
        }
    }

    public static function get_month_number($tx_date){
        $arr_date = explode("-", $tx_date);
        return intval($arr_date[1]);
    }

    public static function get_year_number($tx_date){
        $arr_date = explode("-", $tx_date);
        return intval($arr_date[0]);
    }

    public static function month_name(){
        $a = Array();
        $a[1] = "Januari";
        $a[2] = "Februari";
        $a[3] = "Maret";
        $a[4] = "April";
        $a[5] = "Mei";
        $a[6] = "Juni";
        $a[7] = "Juli";
        $a[8] = "Agustus";
        $a[9] = "September";
        $a[10] = "Oktober";
        $a[11] = "November";
        $a[12] = "Desember";
        return $a;
    }

    public static function month_name_simple(){
        $a = Array();
        $a[1] = "Jan";
        $a[2] = "Feb";
        $a[3] = "Mar";
        $a[4] = "Apr";
        $a[5] = "Mei";
        $a[6] = "Jun";
        $a[7] = "Jul";
        $a[8] = "Ags";
        $a[9] = "Sep";
        $a[10] = "Okt";
        $a[11] = "Nov";
        $a[12] = "Des";
        return $a;
    }

    public static function get_month_name_simple($n){
        return self::month_name_simple()[intval($n)];
    }

    public static function get_month_name($n){
        return self::month_name()[intval($n)];
    }

    //get simple date Y-m-d
    public static function get_simple_date($tx_date, $show_year = true){
        $arr_date = explode("-", $tx_date);
        $d = intval($arr_date[2]);
        $d .= " ";
        $d .= self::get_month_name_simple($arr_date[1]);

        if($show_year){
            $d .= " ";
            $d .= $arr_date[0];
        }

        return $d;
    }

    public static function tahun(){
        return date('Y');
    }

    public static function get_day_number($tx_date){
        $arr_date = explode("-", $tx_date);
        return intval($arr_date[2]);
    }

    public static function format_tanggal_surat($tx_date){
        //setLocale(LC_TIME, "id_ID");
        //Carbon::setLocale('id');
        //setLocale(LC_TIME, $this->app->getLocale())
        //config(['app.locale' => 'id']);
        $date = Carbon::createFromFormat('Y-m-d',$tx_date);
        $date->locale("id_ID");
        return $date->isoFormat("LL");
        //return Carbon::now()->locale("id_ID");//->format('d F Y');
    }

    public static function format_tanggal_sederhana($tx_date){
        setlocale(LC_TIME, "id_ID");
        Carbon::setLocale('id');
        return Carbon::createFromFormat('Y-m-d',$tx_date)->format('d/m/Y');
    }

    private static function date_ind($day_eng){
        $r = "";
        switch($day_eng){
            case "Sun": $r = "Minggu"; break;
            case "Mon": $r = "Senin"; break;
            case "Tue": $r = "Selasa"; break;
            case "Wed": $r = "Rabu"; break;
            case "Thu": $r = "Kamis"; break;
            case "Fry": $r = "Jumat"; break;
            case "Sat": $r = "Sabtu"; break;
        }
        return $r;
    }

    public static function get_day_name($tx_date){
        $nameOfDay = date('D', strtotime($tx_date));
        return self::date_ind($nameOfDay);
    }

    public static function toggle($tx_date, $separator="-"){
        $tgls = explode("-", $tx_date);
        if(count($tgls) == 3){
            $tgl = $tgls[2].$separator.$tgls[1].$separator.$tgls[0];
            return $tgl;
        }else{
            return false;
        }
    }



    public static function format_sql($tx_date){
        if($tx_date != ""){
            return Carbon::createFromFormat('d/m/Y', $tx_date)->toDateString();
        }else{
            return null;
        }

    }

    public static function now(){
        return Carbon::now();
    }
}
