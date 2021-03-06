<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Requests;
use Guzzle\Http\Client;
use Illuminate\Http\Request;
use App\Http\Models\Vaccine;
use App\Http\Models\Medicine;
use App\Http\Models\Lab;
use App\Http\Models\Vaccination;
use App\Http\Models\Diagnosis;
use App\Http\Models\Prescription;
use App\Http\Models\Labrequest;

class homeController extends Controller
{

    protected $medix;
    protected $takes = 10;
    protected $offsets = 0;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('nocache');
        $this->medix = new \App\Medix\Client();
    }
   
    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | DISPLAY THE HOMPAGE (DASHBOARD)
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function index()
    {

        if (! \Session::has('token')) {
            return redirect('/#about')->with('message',['type'=> 'danger','text' => 'Access denied, Please Login!']);
        }
        
        return $this->recent();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function next()
    {
        $this->takes   += 10;
        $this->offsets += 10;
        return $this->patientRecords();
    }

    public function prev()
    {
        $this->takes -= 10;
        $this->offsets -= 10;
        return $this->patientRecords();
    }

    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | DISPLAY THIS LIST OF PATIENTS
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function patientRecords(Request $req)
    {
        if (! \Session::has('token')) {
            return redirect('/#about')->with('message',['type'=> 'danger','text' => 'Access denied, Please login to access Patient Records!']);
        }

        $patients = $this->medix->get('patient?take=1000');
        //dd(date('H:i:s', strtotime(Carbon::now())));
        $collection = collect($patients->data);
        $sorted = $collection->sortByDesc('created_at');
        //dd($sorted->values()->all());
        $mytime = Carbon::now();

        return view('pages.patientRecordsPage')
            ->with('time', $mytime)
            ->with('patients', $sorted->values()->all());
    }

    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | CREATE A SEARCH QUERY (ALLOWED TERMS: FIRSTNAME, LASTNAME)
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |*/
    
    public function searchResult(Request $request)
    {
        $request -> all();
        $search = $request->input('q');

        if (! \Session::has('token')) {
            return redirect('/#about')->with('message',['type'=> 'danger','text' => 'Access denied, Please Login!']);
        }

        $lastname = $this->medix->get('patient?lastname='. $search);
        $firstname = $this->medix->get('patient?firstname='. $search);
        //dd($search);
        //$firstname = $this->medix->get('patient?firstname='. $search);

        //dd($firstname);

        if ($firstname->data) {
            foreach ($firstname->data as $f) { 
                $fname1 = $f->user->firstname;
                $lname1 = $f->user->lastname;
            } if (strcasecmp($search, $fname1)==0) {
            return view('pages.searchResult')
                ->with('result', $firstname->data)
                ->with('total', count((array)$firstname->data). ' Matching records found.')
                ->with('search', $search);
            }
        } if (empty((array)$firstname->data)) {
            if ($lastname->data){
                foreach ($lastname->data as $l) { 
                    $fname2 = $l->user->firstname;
                    $lname2 = $l->user->lastname;
                } if (strcasecmp($search, $lname2)==0) {
                return view('pages.searchResult')
                    ->with('result', $lastname->data)
                    ->with('total', count((array)$lastname->data). ' Matching records found.')
                    ->with('search', $search);
                }
            } if (empty((array)$lastname->data)){
                return view('pages.searchResult')
                ->with('result', $lastname->data)
                ->with('total', 'No matching records found!')
                ->with('search', $search);
            }
        }
}
    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | DISPLAYS THE INFO OF PATIENT TO EDIT PATIENT FORM
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function editPatient($id)
    {
        if (! \Session::has('token')) {
            return redirect('/#about')->with('message',['type'=> 'danger','text' => 'Access denied, Please Login to view a patient profile!']);
        }

        $profile = $this->medix->get('patient/'.$id);
        //dd($profile);
        return view('forms.editPatient')
            ->with('prof', $profile->data);
    }
    
    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | DISPLAYS THE PAGE FOR SCHEDULER
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function scheduler()
    {
        if (! \Session::has('token')) {
            return redirect('/#about')->with('message',['type'=> 'danger','text' => 'Access denied, Please Login to access scheduler!']);
        }
        return view('pages.schedulerPage');
    }



    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | CREATES THE INFORMATION TO BE DISPLAYED TO THE HOMEPAGE (DASHBOARD)
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function recent()
    {
        $patients = $this->medix->get('patient?take=1000');
        //dd($patients);
        $mytime = Carbon::now();
        $reminders = Vaccination::with('vaccine')
                        ->where('date', date('Y-m-d',strtotime($mytime)))
                        ->where('status', 'pending')
                        ->get();
        $collection = collect($patients->data);
        $sorted = $collection->sortByDesc('created_at');


        $collection1 = collect($patients->data);
        $queue = $collection1->sortBy('created_at');
        //dd($sorted->values()->all());
        

        //dd($reminders);
        return view('pages.homePage')
            ->with('time',     $mytime)
            ->with('queue',    $queue->values()->all())
            ->with('consults', $sorted->values()->all())
            ->with('reminder', $reminders);
       //return dd($result);
    }

    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | FUNCTIONS FOR LOGGING OUT THE USER
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function logout()
    {
        \Session::forget('user_id');
        \Session::forget('fname');
        \Session::forget('lname');
        \Session::forget('role');
        \Session::forget('prc');
        \Session::forget('ptr');
        \Session::forget('license');
        \Session::forget('token');
        return redirect('/');
    }

    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | DISPLAYS THE FORM FOR ADDING NEW PATIENT
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function register()
    {
        if (! \Session::has('token')) {
            return redirect('/#about')->with('message',['type'=> 'danger','text' => 'Access denied, Please Login!']);
        }
        return view('forms.patientRegister');
    }

    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | DISPLAYS AN ERROR 404 PAGE IF AN UNEXPECTED EXCEPTIONS OCCUR
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function error()
    {
        return view('pages.errorPage');
    }

    /*---------------------------------------------------------------------------------------------------------------------------------------------
    | ANALYTICS PAGE
    |----------------------------------------------------------------------------------------------------------------------------------------------
    |
    */
    public function analytics()
    {
        if (! \Session::has('token')) {
            return redirect('/#about')->with('message',['type'=> 'danger','text' => 'Access denied, Please Login!']);
        }
        
        $reports  = $this->medix->get('management/reports');
        return view('pages.analytics')
            ->with('counts', $reports->data);
    }
}