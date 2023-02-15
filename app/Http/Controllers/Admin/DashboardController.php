<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\Account;
use App\Models\Address;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Tecnology;
use App\Models\Region;
use App\Models\City;
use App\Models\Level;
use App\Models\Path;
use App\Models\Post;
use App\Models\Project;
use App\Models\Type;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Vote;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/* INTERFACCIA PRIVATA LOGGATO */
class DashboardController extends Controller
{

  public function home(Request $request)
  {

    $request = $request->ip();

    $user = Auth::user();
    if ($user->is_superadmin == true) {

      /* profilo */
      $account = Account::all();
      $userDetail = UserDetail::all();
      $addres = Address::all();

      /* attività */
      $projects = Project::all();
      $types =Type::all();
      $levels =Level::all();
      $tecnologies =Tecnology::all();


        $posts = Post::all(); //
      $votes = Vote::all(); //

      /* utenti - messaggi */
      $users = User::all();


      /* maps */
      $svgPaths = Path::all();
      $continents = Continent::all();
      $countries = Country::all();
      $regions = Region::all();
      $cities = City::all();

      /* passo dati diversi alla stessa view a seconda che sia superadmin o no*/
      return view('user.dashboard', compact('svgPaths', 'continents', 'request', 'user', 'account', 'userDetail', 'addres', 'projects', 'posts', 'votes', 'users','tecnologies', 'types', 'levels'));
    } else {
      /* passo dati diversi alla stessa view a seconda che sia superadmin o no*/
      return view('user.dashboard', compact('user', 'account', 'userDetail', 'address', 'projects', 'posts', 'votes', 'users'));
    }

  }

/*** ACCOUNT **************************************************/

}