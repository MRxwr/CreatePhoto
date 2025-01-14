<?php

namespace Sbhadra\Calendar\Models;
use Sbhadra\Photography\Models\Timeslot;
use Illuminate\Support\Facades\DB;

use Juzaweb\Models\Model;

class DaySlots extends Model
{
    protected $table = 'day_slots';
    protected $fillable = ['day_key','slot_id'];
    
    public function getTimeslot($dayKey,$type='normal')
    {
        if($type=='normal'){
           return DB::table('day_slots')
                ->join('timeslots', 'day_slots.slot_id', '=', 'timeslots.id')
                ->where('day_slots.day_key', $dayKey)
                ->where('day_slots.status', 1)
                ->where('timeslots.slot_type', 'normal')
                ->select('timeslots.*')
                ->get();
        }else{
            return DB::table('day_slots')
                ->join('timeslots', 'day_slots.slot_id', '=', 'timeslots.id')
                ->where('day_slots.day_key', $dayKey)
                ->where('day_slots.status', 1)
                ->where('timeslots.slot_type', 'ramadan')
                ->select('timeslots.*')
                ->get();  
        }
    }
    
    //  $slots = (new DaySlots)->getTimeslot(2);
    //     dd($slots);
    
}
