@extends('layouts/main')

@section('content')

<h4 style="text-align : center"> information sur ce contact  </h4>

  <table class="table">
				
 <tr> <td><a href=""> Nom :  </a></td><td>{{ $contact->contact_name }}</td> </tr> 
<tr> <td><a href=""> Email :  </a></td><td>{{ $contact->contact_email }}</td> </tr> 
<tr> <td><a href=""> Message :  </a></td><td>{{ $contact->contact_message }}</td> </tr> 
<tr> <td><a href=""> Date de contact :  </a></td><td>{{ $contact->contact_date }}</td> </tr>  
  </table>
@endsection
