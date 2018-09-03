<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Email')</title>
</head>
<body>


	<table style="width: 100%; height: auto; position: relative; display: table; ">
        <tbody>
            <tr>
                <td>
                    <div  style="width: 600px;margin: 0 auto;display: block; background-color: #f0f1f2;padding: 2em; position: relative;">
                        <table  style="width: 600px; height: auto; position: relative;">
                            <tbody>
                            <tr>
                            <td style="font-family:'Roboto', sans-serif;">
                             <div style="top: 0; width: 100%; height: auto; min-height: 100px; position: relative; background-color: #fff; padding-top: 2em;padding-bottom: 2em;">

                             <div style="width: 100px; height: auto; position: relative; display: block; text-align: center;margin: 0 auto;margin-bottom: 1em;">
                                          
                                            <img src="{{ asset('img/logo.png') }}" alt="Logo - BADeveloper" title="Logo - BADeveloper" style="width: 100%; height: auto; position: relative;">
                                 </div>

								                  @yield('content')

                             
                             </div>
                            </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

	
</body>
</html>