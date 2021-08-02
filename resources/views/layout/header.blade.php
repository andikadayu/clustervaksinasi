<html>

<head>
    <title>Clustering WEBGIS Bengkulu</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <link rel="stylesheet" type="text/css" href="{{asset('css/sb-admin-2.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('css/sb-admin-2.min.css')}}">
   
   <link rel="stylesheet" type="text/css" href="{{asset('js/panel/src/leaflet-panel-layers.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('js/cluster/dist/MarkerCluster.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('js/cluster/dist/MarkerCluster.Default.css')}}">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <style type="text/css">
        
        .pagination li{
		float: left;
		list-style-type: none;
		margin:5px;
	}

        .buttons {
        background-color: #87CEFA;
        width: 300px;
        border: none;
        color: black;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        }
    }

        .button {   
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }

        .button2 {
            width: 80px;
            height: 80px;
            left: 10px;
            background-color: #00FA9A;
           
        } /* Green */
        .button3 {
            width: 80px;
            height: 80px;
            background-color: #FFFF00;
        } /* Yellow */ 
        .button4 {
            width: 80px;
            height: 80px;
            background-color: #EF820D;
        } /* Orange */ 
        .button5 {
            width: 80px;
            height: 80px;
            background-color: #CD5C5C;
        } /* Red */
        #mapid { 
            position: absolute;
            height: 70vh; 
            width: 120vh;
            top: 120px;
            right: 50px;
        }

        #map { 
            position: absolute;
            height: 50vh; 
            width: 70vh;
            top: 120px;
            right: 100px;
        }
        
        #cardfiltermap{
            position: absolute;
            height: 60vh; 
            width: 60vh;
            top: 120px;
            left: 420px;
        }

        #cardfiltermap1{
            position: absolute;
            height: 60vh; 
            width: 60vh;
            top: 180px;
            right: 380px;
        }


        #card{
            position: absolute;
            height: 60vh; 
            width: 60vh;
            top: 120px;
            left: 50px;
        }

        #card2{
            position: absolute;
            height: 60vh; 
            width: 60vh;
            top: 690px;
            left: 700px;
        }
            
    </style>

</head>

<body>