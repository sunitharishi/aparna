@extends('layouts.authlogin')

@section('content')
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    <div class="apmspl-main">
    <div class="row">
        <div class="apmspl res-apm">
            <div class="panel panel-default">
				
                <div class="panel-body">
                   <div class="apmspl-sub">
                  
                      <div class="col-sm-6 left-side">
                       <!-- <img src="images/technology-image.jpg"  class="technology-apmspl" />-->
                        <img src="/images/logo-new.png"  class="logo-apmspl" />
                    </div>
                    <div class="col-sm-6 right-side">
                      <div class="apmspl-logindetails">
                      	<img src="/images/apms-logo.png" />
                          
                            @if (count($errors) > 0)
                                <div class="alert-message">
                                    <p style="color:yellow;">Invalid username or password</p>
                                   <?php /*?> <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul><?php */?>
                                </div>
                            @endif
                          
                          
                          
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
                            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                             <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                             <input type="password" class="form-control" name="password" placeholder="Password">
                              <p><input type="checkbox" name="remember"> Remember me</p>
                              <input type="submit" value="Login" class="form-control"  />
                        </form>
                     </div>
                    </div>
                </div>
				</div>
            </div>
        </div>
    </div>
    </div>
@endsection