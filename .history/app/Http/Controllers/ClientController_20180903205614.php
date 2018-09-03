<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title as Title; // protected $titles_array = ['Mr', 'Mrs', 'Ms', 'Dr', 'Mx', 'Professor'];
use App\Client as Client;/*  function reservations(){return $this->hasMany('App\Reservation');

To simplify the syntax, think of the return $this->hasMany('App\Reservation', 'foreign_key', 'local_key'); parameters as:
The model you want to link to
The column of the foreign table (the table you are linking to) that links back to the id column of the current table (unless you are specifying the third parameter, in which case it will use that)
The column of the current table that should be used - i.e if you don't want the foreign key of the other table to link to the id column of the current table
    */
    
use Illuminate\Support\Facades\DB;
class ClientController extends Controller
{
    //
    public function __construct( Title $titles, Client $client )
    {/*__construct was introduced in PHP5 and it is the right way to define your, well, 
    constructors (in PHP4 you used the name of the class for a constructor).
 You are not required to define a constructor in your class, but if you wish to pass any parameters on object 
 construction then you need one.
An example could go like this*/
        $this->titles = $titles->all(); //This goes to MODEL called titles.php !!
        /* Eloquent all method will return all of the results in the model's table. 
        Since each Eloquent model serves as a query builder, you may also add constraints 
        to queries, and then use the get() method to retrieve the results:*/
        
        $this->client = $client; //Important for editing existing clients her it helps the modify function
    }

    public function di()
    {
        dd($this->titles); //used for debugging VarDumper component provides mechanisms for walking through any arbitrary PHP variable
    }

    public function index()
    {
        //dont forgert to use Illuminate\Support\Facades\DB;
        $client = DB::table('users')->get()->reverse(); /*You may use the table method on the DB facade to begin a query. 
        The table method returns a fluent query builder instance for the given table,
        allowing you to chain more constraints onto the query and then finally get the results using the get method: */
        return view('client.index', ['clients' => $client]);
       
        // $data = [];
//
       // $data['clients'] = $this->client->all()->reverse();
       // return view('client/index', $data);
    }

    public function export() //Export files to a given filetype eg csv
    {
       $data = [];/* An array in PHP is actually an ordered map. 
       A map is a type that associates values to keys.
        This type is optimized for several different uses;
         it can be treated as an array, list (vector), hash table (an implementation of a map),
        dictionary, collection, stack, queue, and probably more.
         As array values can be other arrays,
        trees and multidimensional arrays are also possible.*/
       $data['clients'] = $this->client->all()->reverse();
       header('Content-Disposition: attachment;filename=export.csv');
       return view('client/export', $data);
    }

    public function newClient( Request $request, Client $client )
    {
 /* HTTP Requests
Accessing The Request/ Request Path & Method /PSR-7 Requests/Input Trimming & Normalization
Retrieving Input / Old Input /Cookies/Files/Retrieving Uploaded Files
Storing Uploaded Files/Configuring Trusted Proxies

Accessing The Request:
To obtain an instance of the current HTTP request via dependency injection, you should type-hint the Illuminate\Http\Request class on your controller method. 
The incoming request instance will automatically be injected by the service container: */
        $data = [];
        $data['title'] = $request->input('title');           //this is a column name and value
        $data['name'] = $request->input('name');            //this is a column name and value
        $data['last_name'] = $request->input('last_name');  //this is a column name and value
        $data['address'] = $request->input('address');      //this is a column name and value
        $data['zip_code'] = $request->input('zip_code');    //this is a column name and value
        $data['city'] = $request->input('city');            //this is a column name and value
        $data['state'] = $request->input('state');          //this is a column name and value
        $data['email'] = $request->input('email');           //this is a column name and value
        


        if( $request->isMethod('post') /* isMethod method to verify that the HTTP verb matches a given string: */ )
                 {
            //dd($data);
            $this->validate(
                /* As you can see, we pass the desired validation rules into the validate method. 
                Again, if the validation fails, the proper response will automatically be generated.
                 If the validation passes, our controller will continue executing normally. */
                $request,
                [
                    'name' => 'required|min:5', //validation rule
                    'last_name' => 'required', //validation rule
                    'address' => 'required', //validation rule
                    'zip_code' => 'required', //validation rule
                    'city' => 'required', //validation rule
                    'state' => 'required', //validation rule
                    'email' => 'required', //validation rule

                ]
            );

            $client->insert($data);/*the insert method inserts records to a database table. 
            The insert method accepts an array of column names and values: */
            
             return redirect('clients'); /* Sometimes you may wish to redirect the user to their previous location,
              such as when a submitted form is invalid. */
                 } //End of if not validated
        //IF ALL INPUT FIELDS ARE VALIDATED run this:         
        $data['titles'] = $this->titles; /*pass the data called title from title.php MODEL into the form  
        protected $titles_array = ['Mr', 'Mrs', 'Ms', 'Dr', 'Mx', 'Professor']; as a titles variable*/
        $data['modify'] = 0; //whatever modify is it's 0 or fals
        return view('client/form', $data);
    }

    public function create()
    {
            return view('client/create');
    }

    public function show($client_id, Request $request)
    {
        //car
        $data = []; $data['client_id'] = $client_id;
        $data['titles'] = $this->titles;
        $data['modify'] = 1;
        $client_data = $this->client->find($client_id);
        $data['name'] = $client_data->name;
        $data['last_name'] = $client_data->last_name;
        $data['title'] = $client_data->title;
        $data['address'] = $client_data->address;
        $data['zip_code'] = $client_data->zip_code;
        $data['city'] = $client_data->city;
        $data['state'] = $client_data->state;
        $data['email'] = $client_data->email;

        $request->session()->put('last_updated', $client_data->name . ' ' . 
        $client_data->last_name);
        
        return view('client/form', $data);
    }

    public function modify( Request $request, $client_id, Client $client )
    {
        $data = [];

        $data['title'] = $request->input('title');
        $data['name'] = $request->input('name');
        $data['last_name'] = $request->input('last_name');
        $data['address'] = $request->input('address');
        $data['zip_code'] = $request->input('zip_code');
        $data['city'] = $request->input('city');
        $data['state'] = $request->input('state');
        $data['email'] = $request->input('email');
        


        if( $request->isMethod('post') )
        {
            //dd($data);
            $this->validate(
                $request,
                [
                    'name' => 'required|min:5',
                    'last_name' => 'required',
                    'address' => 'required',
                    'zip_code' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'email' => 'required',

                ]
            );

            $client_data = $this->client->find($client_id);

            $client_data->title = $request->input('title');
            $client_data->name = $request->input('name');
            $client_data->last_name = $request->input('last_name');
            $client_data->address = $request->input('address');
            $client_data->zip_code = $request->input('zip_code');
            $client_data->city = $request->input('city');
            $client_data->state = $request->input('state');
            $client_data->email = $request->input('email');

            $client_data->save();

            return redirect('clients');
        }
        
        return view('client/form', $data);
    }

}
