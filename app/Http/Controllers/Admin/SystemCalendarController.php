<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public function index() 
    {
        $events = []; 

        foreach (\App\Invoice::all() as $invoice) { 
           $crudFieldValue = $invoice->getOriginal('date'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $invoice->budget_total; 
           $prefix         = 'Invoice amount €'; 
           $suffix         = ''; 
           $dataFieldValue = trim($prefix . " " . $eventLabel . " " . $suffix); 
           $events[]       = [ 
                'title' => $dataFieldValue, 
                'start' => $crudFieldValue, 
                'url'   => route('admin.invoices.edit', $invoice->id)
           ]; 
        } 


       return view('admin.calendar' , compact('events')); 
    }

}
