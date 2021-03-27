@extends('layouts.app1')
@section('content')
<style>
    .btn-filter {
        position: relative;
        padding: 4px 12px;
        border-radius: 50px;
        height: 36px;
        border: 1px solid #e4e6e7;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        margin-right: 10px;
    }

    .filter-buttons-wrap {
        padding: 11px;
        border: 1px solid ghostwhite;
    }.at-fwidget-content li a::before {
    display: none;
    }
    #map {
      height: 550px;
      width: 100%;
      border-radius: 15px;
    }
    .mx-100{height: 100%;}
    .mx_city{color: #667484}
    .table tbody td {text-align: left;padding: 0; line-height: 10px;}
    input.mx_radio {
        height: auto;
        width: auto;
        margin-right: 10px;
    }
    .radio_parent{
        display: flex;
    }

div#map {
    position: fixed !important;
    width: 40%;
    left: 0;
    height: 529px;
    z-index: -1;
    top: 96px;
}

#at-header .at-navigationarea {
    position: fixed;
    background: #fff;
    top: 0;
    box-shadow: 0 0 2px 1px rgb(0 0 0 / 10%);
}
main#at-main {
    margin-top: 95px;
}
.at-properties-listing {
    margin-top: 12px;
}
.at-properties-listing .row {
    border: 1px solid #e0e0e0;
    overflow: hidden;
    border-radius: 4px;
    margin-left: 18px;
    box-shadow: 0 0 12px 0 rgb(41 41 41 / 10%);
}
.at-properties-listing .row:hover img {
    transform: scale(1.1);
    transition: 0.2s ease-in;
}
.at-properties-listing .row .col-4 {
    max-width: 100%;
    padding: 0;
}
.at-properties-listing .row .col-8 {
    max-width: 100%;
    background: #fff;
    padding-bottom: 12px;
    margin-top: -10px;
    padding-top: 10px;
    display: inline-block;
    float: left;
    width: 100%;
}
.at-properties-listing tbody tr td {
    line-height: 20px;
    width: 100%;
    display: inline-block;
}
.at-properties-listing .row table.table.table-borderless {
    margin-bottom: 5px;
    margin-top: 6px;
}
.at-properties-listing .col-4 img {
    height: 200px;
    object-fit: cover;
    width: 100%;
}
.at-properties-listing tr.mx_list {
    width: 50%;
    float: left;
    font-size: 14px;
}
.filter-buttons-wrap {
    margin-left: 19px;
    width: 99%;
}
@media screen and (max-width: 414px){
#at-main .mx-100 {
    height: unset;
}
.filter-buttons-wrap.overflow-auto.shadow-sm.px-3 {
    margin-top: 250px;
    margin-bottom: 5px;
}
.at-haslayout.at-main-section {
    padding-bottom: 0;
}
div#proplist {
    width: 100%;
    display: inline-block;
    text-align: center;
}
div#map {
    position: absolute !important;
    left: 0;
    top: -19px;
    display: inline-block;
    width: 100%;
    height: 250px;
}
.at-properties-listing .row {
    width: 91%;
    float: unset;
    height: auto;
}
.filter-buttons-wrap {
    width: 90%;
}
.at-properties-listing .mx_list td {
    line-height: 16px !important;
}
.at-properties-listing>div+div {
    margin-top: 15px;
}
}
</style>

<!-- Main Start -->
<main id="at-main" class="at-main at-haslayout">

    <!-- Two Columns Start -->
    <div class="at-haslayout at-main-section">
        <div class="container-fluid">
            <div class="row">
                <div id="at-twocolumns" class="at-twocolumns at-haslayout">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-7 float-left mx-100" style="max-width: 40% !important;">
                        <div name="mapdiv" id="map"></div>
                    </div>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 col-xl-5 float-right" style="max-width: 59% !important;">
                        <!-- Properties List Start -->
                       
                        <div data-v-0028496c="" class="filter-buttons-wrap overflow-auto shadow-sm px-3">
                            <div data-v-0028496c="" class="btn-filter text-nowrap" style="display: none;"><img
                                    data-v-0028496c="" src="" height="20"
                                    width="20" alt="Filters" aria-hidden="true" class="svg-icon icon-black"> <span
                                    data-v-0028496c="" class="ml-1"> Add Filters</span></div>
<!--
                            <div data-v-0028496c="" data-toggle="modal" data-target="#datefilterpopup"  class="btn-filter text-nowrap"><span data-v-0028496c="">Dates</span>
                            </div>
-->                            
                            <div data-v-0028496c="" data-toggle="modal" data-target="#filterpopup" class="btn-filter text-nowrap"><span
                                    data-v-0028496c="">Filter</span> </div>

                            <div data-v-0028496c="" data-toggle="modal" data-target="#sortbypopup"  class="btn-filter text-nowrap"><span data-v-0028496c="">Sort
                                    By</span>
                            </div>
                            <div style="float: right;border:none" data-v-0028496c="" class="btn-filter text-nowrap">
                                <span data-v-0028496c=""><i style="font-size: 20px;" class="far fa-heart"></i></span>
                            </div>

                        </div>
                        <div class="at-properties-listing" id="proplist">
                           
                        </div>
                        <!-- Properties List End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Two Columns End -->




</main>

{{-- Date Filter Model --}}
<div class="modal fade at-datefilterpopup" tabindex="-1" role="dialog" id="datefilterpopup" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="at-modalcontent modal-content">
            <div class="at-popuptitle">
                <h4>Filter By Dates</h4>
                <a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross" data-dismiss="modal"></i></a>
            </div>

            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-6">
                            <label>From</label>
                        `   <input class="form-control" type="date" name="fromdate">                            
                        </div>
                        <div class="col-6">
                            <label>To</label>
                        `   <input class="form-control" type="date" name="todate">                            
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-sm btn-success float-right px-4" type="button" onclick="setfilter();">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Date Filter Model End --}}

{{-- Filter Model --}}
<div class="modal fade at-filterpopup" tabindex="-1" role="dialog" id="filterpopup" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="at-modalcontent modal-content">
            <div class="at-popuptitle">
                <h4>Filter By</h4>
                <a href="javascript:void(0);" class="at-closebtn close "><i class="lnr lnr-cross jq_close" data-dismiss="modal"></i></a>
            </div>

            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-12">
                            <h6>Price </h6>
                        </div>
                        <div class="col-6">
                            <label>From</label>
                        `   <input class="form-control" type="tel" name="fromprice">                            
                        </div>
                        <div class="col-6">
                            <label>To</label>
                        `   <input class="form-control" type="tel" name="toprice">                            
                        </div>

                        <div class="col-12 mt-2">
                            <h6>Activity/Purpose </h6>
                        </div>
                        <div class="col-12">

                            <ul style="list-style:none;margin-top: 0;margin-bottom: 1rem;columns: 3;">
                                        <?php
                                         $itemsArray = json_decode(json_encode($other), true);
                                        ?>
                                       @if($itemsArray)  
                                        @foreach($itemsArray as $item)
                                          <li id="li<?php echo $item['id'];?>" data-li="1" data-id="<?php echo $item['id'];?>" onclick="lipick(this)"><?php echo $item['name'];?></li>
                                        @endforeach
                                       @endif
                            </ul>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-sm btn-success float-right px-4" type="button" data-dismiss="modal" onclick="setfilter();">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Filter Model End --}}

{{-- SortBy Model --}}
<div class="modal fade at-sortbypopup" tabindex="-1" role="dialog" id="sortbypopup" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="at-modalcontent modal-content">
            <div class="at-popuptitle">
                <h4>Sort By-</h4>
                <a href="javascript:void(0);" class="at-closebtn close"><i class="lnr lnr-cross" data-dismiss="modal"></i></a>
            </div>

            <div class="modal-body">
                <form>
                    <div class="row" id = "parentradio">
                        <div class="col-12 radio_parent">
                            <input class="form-control mx_radio" checked ="checked " type="radio" name="sortby">Lower to higher price
                        </div>
                        <div class="col-12 radio_parent">
                            <input class="form-control mx_radio" type="radio" name="sortby">Higher to lower price
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-sm btn-success float-right px-4" type="button" onclick="setfilter();">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- SortBy Model End --}}

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ6FIa67coeTSo5AOBVnvjpOqyeKUNi78&callback=initialize"></script>
<script>
var map;
var latitude = "40";
var longitude = "20";
var swlat;
var nelat;
var swlng;
var nelng;

window.onload = function() {
}

function lipick(ctl)
{

    if (ctl.style.backgroundColor != "gainsboro"){
        ctl.style.backgroundColor = "gainsboro";
        $(ctl).attr("selected","selected");
        $(this).attr("data-sel","1")
    } else {
        ctl.style.backgroundColor = "transparent";
        $(ctl).removeAttr("selected");
        $(this).attr("data-sel","0")
    }
}
    
function setfilter()
{
    var activity = "";
    $('[data-li="1"]').each(function () {
        if ($(this).attr("selected")=="selected")
        {
            activity +=$(this).attr("data-id")+",";
        }
    });
    if (activity.length !=0)
    {
        activity = " AND h.mainintention IN(" + activity.substring(0,activity.length-1) +") ";
    }
    
    initialize(activity)
}


function initialize(activity) {
    var mapcenter = {
        lat: 59.35,
        lng: 18.07
    };
    map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: mapcenter
        });


    // load new images in slider on map resize
    google.maps.event.addListener(map, 'idle', function() {
        var bounds = map.getBounds();
        var ne = bounds.getNorthEast();
        var sw = bounds.getSouthWest();
        swlat = sw.lat();
        nelat = ne.lat();
        swlng = sw.lng();
        nelng = ne.lng();
        loadFilteredimages(swlat, nelat, swlng, nelng, map,activity); //populates list and map
    });

}

function loadFilteredimages(swlat, nelat, swlng, nelng, map, activity=null)
{     
    
    $.ajax({
        type:'post',
        url: '{{ route('filter') }}' ,
        data: {'_token': '{{ csrf_token() }}','activity': activity},
        success: function(data){
            if(data){
                       
                var html = '';
                var locationList = data;
                
                var locations = [];
                
                for (var i = 0; i < locationList.length; i++) {
                    locations.push([locationList[i].latitude, locationList[i].longitude,locationList[i].name,locationList[i].rent]);

                    if (parseFloat(locationList[i].latitude) >= swlat && parseFloat(locationList[i].latitude) <= nelat && (locationList[i].longitude) >= swlng  && parseFloat(locationList[i].longitude) <= nelng ) {
                        
                        html += makeOneItem(locationList[i].id,locationList[i].url,locationList[i].city,locationList[i].district,locationList[i].name,locationList[i].language,locationList[i].activity,locationList[i].dietname,locationList[i].altactivity,locationList[i].rent, 'USD');
                    }

                    
                }
                setMarker(locationList, map);
                document.getElementById('proplist').innerHTML = html;
                // add inner html to document.getElementById('proplist')
            }
        },
        error:function(data){
            console.log('Error');
        }
    });
}



function makeOneItem(id,image,city,district,name,language,activity1,diet,activity2,rent,currrency)
{
var imagepath = '{{asset('public/img/Photo')}}';     
var url = '{{url('PropertySingle')}}';     
var html = "";    
    html += '<div class="row">';    
        html += '<div class="col-4">';
            html += '<a href="'+url+'/'+id+'" target="_blank"><img height="150px" src="' +imagepath+'/'+image+'"></a>'; 
        html += '</div>';
        html += '<div class="col-8 ">';
            html += '<table class="table table-borderless" style="width: 100%">';
                html += '<tbody>';
                html += '<tr class="mx_city">';
                    html += '<td><span class="text-left small text-muted text-uppercase">'+district+', '+city+'</span><br><a href="'+url+'/'+id+'" target="_blank">'+name+'</a></td>';
                html += '</tr>';
                html += '<tr class="mx_list">';
                    html += '<td><span class="text-left small text-muted text-uppercase">Common language</span><br>'+language+'</td>';
                html += '</tr>';
                html += '<tr class="mx_list">';
                    html += '<td><span class="text-left small text-muted text-uppercase">Purpose</span><br>'+activity1+'</td>';
                html += '</tr>';
                html += '<tr class="mx_list">';
                    html += '<td><span class="text-left small text-muted text-uppercase">Food</span><br><span>'+diet+'</span></td>';
                html += '</tr>';
                html += '<tr class="mx_list">';
                    html += '<td><span class="text-left small text-muted text-uppercase">Opportunities</span><br>'+activity2+'</td>';
                html += '</tr>';
                html += '<tr class="mx_list">';
                    html += '<td><span class="text-left small text-muted text-uppercase">Montly</span><br><span> '+currrency+', '+rent+'</span></td>';
                html += '</tr>';
                html += '</tbody>';
            html += '</table>';
          html += '</div>';
    html += '</div>';
    return html;
}



function setMarker(locationList,map) {
        
    var infowindow =  new google.maps.InfoWindow({});
    var marker, count,mapcontent;
    var iconpath = "{{asset('public/img/volonteerwanted.png')}}"; // add path to Volonteer wanted image
    var markercolor = "";
    var currency = "USD";
    for (count = 0; count < locationList.length; count++) {
        if (locationList[count].volonteerwanted !='0'){
            //volonteerwanted
            markercolor = "yellow";
        } else
        {    
            markercolor = "green";
        }
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locationList[count].latitude,locationList[count].longitude),
          map: map,
          title: locationList[count].name,
          icon: {url: "http://maps.google.com/mapfiles/ms/icons/" + markercolor + "-dot.png"}
        });

        // infowindow.open(map, marker);
        mapcontent = '<h6 style="margin:0">'+currency+' '+locationList[count].rent+'</h6>';
        if (locationList[count].volonteerwanted !='0'){
            //volonteerwanted
            mapcontent = '<h6 style="margin:0">'+currency+' '+locationList[count].rent+'</h6>';
            mapcontent += "<img src='" + iconpath + "' id='i' style='width:75px;height:50px;border: 1px solid black;display: block;margin: 0 auto;'>";
        }
        google.maps.event.addListener(marker, 'click', (function (marker, count,mapcontent) {
          return function () {
            infowindow.setContent(mapcontent);
            infowindow.open(map, marker);
          }
        })(marker, count, mapcontent));
    }    
}
</script>



@endsection