<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

if(!function_exists('user_status')) {
    function user_status($status_id, $type=null) {
        switch($status_id){
            case 0:
                $status_text ="Disabled";
                $badge_class = "badge-danger";
                break;
            case 1: 
                $status_text ="Enabled";
                $badge_class = "badge-success";
                break;
            default:
                $badge_class = "badge-secondary";
                $status_text ="UNKNOWN";
        }
        if($type == 1){
            return $status_text;
        }else{
            return "<span class='badge ".$badge_class."'>".$status_text."</span>";
        }    
    }
}

if(!function_exists('shipping_location')) {
    function shipping_location($number) {
        switch($number){
            case 0:
                $name = "All";
                break;
            case 1: 
                $name = "All Malaysia";
                break;
            case 1: 
                $name = "West Malaysia";
                break;
            case 1: 
                $name = "East Malaysia";
                break;
            case 1: 
                $name = "Oversea Only";
                break;
            default:
                $name = "All";
        }
        return $name;  
    }
}

if(!function_exists('status')) {
    function status($status_id, $type) {
        switch($status_id){
            case 0:
                $status_text ="Inactive";
                $badge_class = "badge-danger";
                break;
            case 1: 
                $status_text ="Active";
                $badge_class = "badge-success";
                break;
            default:
                $badge_class = "badge-secondary";
                $status_text ="UNKNOWN";
        }
        if($type == 1){
            return $status_text;
        }else{
            return "<span class='badge ".$badge_class."'>".$status_text."</span>";
        }    
    }
}

if(!function_exists('yes_no_status')) {
    function yes_no_status($status_id, $type) {
        switch($status_id){
            case 0:
                $status_text ="No";
                $badge_class = "badge-warning";
                break;
            case 1: 
                $status_text ="Yes";
                $badge_class = "badge-success";
            break;
            default:
            $badge_class = "badge-secondary";
            $status_text ="UNKNOWN";
        }
        if($type == 1){
            return $status_text;
        }else{
            return "<span class='badge ".$badge_class."'>".$status_text."</span>";
        }    
    }
}
