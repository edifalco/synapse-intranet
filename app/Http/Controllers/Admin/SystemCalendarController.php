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
           $crudFieldValue = $invoice->getOriginal('due_date'); 

           if (! $crudFieldValue) {
               continue;
           }

           $eventLabel     = $invoice->invoice_subtotal; 
           $prefix         = 'Invoice of €'; 
           $suffix         = 'is due today'; 
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
