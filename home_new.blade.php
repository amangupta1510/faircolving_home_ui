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
   width:100%;
   left: 0;
   height: 300px;
   z-index: -1;
   }
   #at-header .at-navigationarea {
   position: fixed;
   background: #fff;
   top: 0;
   box-shadow: 0 0 2px 1px rgb(0 0 0 / 10%);
   }
   main#at-main {
   margin-top: 20px;
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
   width: 100%;
   }
   @media  screen and (max-width: 414px){
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
   left: 0;
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
        <div {{-- class="container-fluid" --}}>
            <div class="col-md-12 row" style="padding-left: 12px;padding-right: : 0px;margin-left: 0px;margin-right: 0px;">
                <div class="col-md-9">
                    <div class="col-xs-12 col-sm-12 col-md-12 map_div" style="padding: 0;">
                        <div class="map_section" name="mapdiv" id="map"></div>
                    </div>
                    <div class="row">
                        <div id="at-twocolumns" class="at-twocolumns at-haslayout">
                            <div class="col-md-12 mt-1">
                                <!-- Properties List Start -->
                                <div data-v-0028496c="" class="filter-buttons-wrap overflow-auto shadow-sm  filter_section">
                                    <div data-v-0028496c="" class="btn-filter text-nowrap" style="display: none;"><img data-v-0028496c="" src="" height="20" width="20" alt="Filters" aria-hidden="true" class="svg-icon icon-black"> <span data-v-0028496c="" class="ml-1"> Add Filters</span></div>
                                    <!--
                           <div data-v-0028496c="" data-toggle="modal" data-target="#datefilterpopup"  class="btn-filter text-nowrap"><span data-v-0028496c="">Dates</span>
                           </div>
                           -->
                                    <div data-v-0028496c="" {{-- data-toggle="modal" data-target="#filterpopup"  --}} class="btn-filter text-nowrap filter_btn filter_close" onclick="filter_btn(this)"><span data-v-0028496c="">Filter</span>
                                    </div>
                                    <div data-v-0028496c="" data-toggle="modal" data-target="#sortbypopup" class="btn-filter text-nowrap"><span data-v-0028496c="">Sort&nbsp;By</span>
                                    </div>
                                    <div style="float: right;border:none" data-v-0028496c="" class="btn-filter text-nowrap">
                                        <label class="switch_type switch-list">
                                            <input class="list_map_btn" type="checkbox" />
                                            <div></div>
                                        </label>
                                        {{-- <span data-v-0028496c=""><i style="font-size: 20px;" class="far fa-heart"></i></span> --}}
                                    </div>
                                </div>
                                <div class="at-properties-listing list_section" id="proplist">
                                </div>
                                <style type="text/css">
                                .card_r {
                                    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.4);
                                    transition: 0.3s;
                                    border-radius: .35rem;
                                }

                                .card_r:hover {
                                    box-shadow: 0 8px 12px 0 rgba(0, 0, 0, 0.4);
                                }

                                .card_btn {
                                    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
                                    transition: 0.3s;
                                }

                                .card_btn:hover {
                                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
                                }
                                </style>
                                <!-- Properties List End -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 list_data_section">
                    <form class="p-3 card_r">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Rent</h6>
                            </div>
                            <div class="col-md-6">
                                <input placeholder="Min" style="border: 1px solid #9e9e9e;" class="form-control" type="tel" name="fromprice">&nbsp;
                            </div>
                            <div class="col-md-6">
                                <input placeholder="max" style="border: 1px solid #9e9e9e;" class="form-control" type="tel" name="toprice">
                            </div>
                            <div class="col-md-12 mt-2">
                                <h6>Activity/Purpose </h6>
                            </div>
                            <div class="col-md-12">
                                <ul class="tags">
                                    <li id="li1" data-li="1" data-id="1" onclick="lipick(this)">Alternative Energy</li>
                                    <li id="li2" data-li="1" data-id="2" onclick="lipick(this)">Alternative Medicine</li>
                                    <li id="li3" data-li="1" data-id="3" onclick="lipick(this)">Animal Welfare</li>
                                    <li id="li4" data-li="1" data-id="4" onclick="lipick(this)">Astronomy</li>
                                    <li id="li5" data-li="1" data-id="5" onclick="lipick(this)">Athletics</li>
                                    <li id="li6" data-li="1" data-id="6" onclick="lipick(this)">Bicycling</li>
                                    <li id="li7" data-li="1" data-id="7" onclick="lipick(this)">Board Games</li>
                                    <li id="li8" data-li="1" data-id="8" onclick="lipick(this)">Bowling</li>
                                    <li id="li9" data-li="1" data-id="9" onclick="lipick(this)">Conservation</li>
                                    <li id="li10" data-li="1" data-id="10" onclick="lipick(this)">Cooking</li>
                                    <li id="li11" data-li="1" data-id="11" onclick="lipick(this)">Crafts</li>
                                    <li id="li12" data-li="1" data-id="12" onclick="lipick(this)">Dancing</li>
                                    <li id="li13" data-li="1" data-id="13" onclick="lipick(this)">Diving</li>
                                    <li id="li14" data-li="1" data-id="14" onclick="lipick(this)">DIY – Do it Yourself</li>
                                    <li id="li15" data-li="1" data-id="15" onclick="lipick(this)">Education technology</li>
                                    <li id="li16" data-li="1" data-id="16" onclick="lipick(this)">Entrepreneurship</li>
                                    <li id="li17" data-li="1" data-id="17" onclick="lipick(this)">Environmental Awareness</li>
                                    <li id="li18" data-li="1" data-id="18" onclick="lipick(this)">Film</li>
                                    <li id="li19" data-li="1" data-id="19" onclick="lipick(this)">Finance</li>
                                    <li id="li20" data-li="1" data-id="20" onclick="lipick(this)">Fishing</li>
                                    <li id="li21" data-li="1" data-id="21" onclick="lipick(this)">Fitness</li>
                                    <li id="li22" data-li="1" data-id="22" onclick="lipick(this)">Gaming</li>
                                    <li id="li23" data-li="1" data-id="23" onclick="lipick(this)">Golf</li>
                                    <li id="li24" data-li="1" data-id="24" onclick="lipick(this)">Healing</li>
                                    <li id="li25" data-li="1" data-id="25" onclick="lipick(this)">Hiking</li>
                                    <li id="li26" data-li="1" data-id="26" onclick="lipick(this)">History</li>
                                    <li id="li27" data-li="1" data-id="27" onclick="lipick(this)">Holistic Health</li>
                                    <li id="li28" data-li="1" data-id="28" onclick="lipick(this)">Horse riding</li>
                                    <li id="li29" data-li="1" data-id="29" onclick="lipick(this)">Human Rights</li>
                                    <li id="li30" data-li="1" data-id="30" onclick="lipick(this)">Hunting</li>
                                    <li id="li31" data-li="1" data-id="31" onclick="lipick(this)">Innovation</li>
                                    <li id="li32" data-li="1" data-id="32" onclick="lipick(this)">Internet Startups</li>
                                    <li id="li33" data-li="1" data-id="33" onclick="lipick(this)">Investing</li>
                                    <li id="li34" data-li="1" data-id="34" onclick="lipick(this)">Karaoke</li>
                                    <li id="li35" data-li="1" data-id="35" onclick="lipick(this)">Kayaking</li>
                                    <li id="li36" data-li="1" data-id="36" onclick="lipick(this)">Languages</li>
                                    <li id="li37" data-li="1" data-id="37" onclick="lipick(this)">Literature</li>
                                    <li id="li39" data-li="1" data-id="39" onclick="lipick(this)">Marketing</li>
                                    <li id="li38" data-li="1" data-id="38" onclick="lipick(this)">Marking new friends</li>
                                    <li id="li40" data-li="1" data-id="40" onclick="lipick(this)">Martial Arts</li>
                                    <li id="li41" data-li="1" data-id="41" onclick="lipick(this)">Medical diet</li>
                                    <li id="li42" data-li="1" data-id="42" onclick="lipick(this)">Medical rehabilitation</li>
                                    <li id="li43" data-li="1" data-id="43" onclick="lipick(this)">Meditation</li>
                                    <li id="li44" data-li="1" data-id="44" onclick="lipick(this)">Mental growth</li>
                                    <li id="li45" data-li="1" data-id="45" onclick="lipick(this)">Mountain Biking</li>
                                    <li id="li46" data-li="1" data-id="46" onclick="lipick(this)">Music</li>
                                    <li id="li47" data-li="1" data-id="47" onclick="lipick(this)">Networking</li>
                                    <li id="li48" data-li="1" data-id="48" onclick="lipick(this)">Neuroscience</li>
                                    <li id="li49" data-li="1" data-id="49" onclick="lipick(this)">Nightlife</li>
                                    <li id="li50" data-li="1" data-id="50" onclick="lipick(this)">Nutrition</li>
                                    <li id="li51" data-li="1" data-id="51" onclick="lipick(this)">Outdoor Activities</li>
                                    <li id="li52" data-li="1" data-id="52" onclick="lipick(this)">Outdoor Sports</li>
                                    <li id="li53" data-li="1" data-id="53" onclick="lipick(this)">Painting</li>
                                    <li id="li54" data-li="1" data-id="54" onclick="lipick(this)">Photography</li>
                                    <li id="li55" data-li="1" data-id="55" onclick="lipick(this)">Religion</li>
                                    <li id="li56" data-li="1" data-id="56" onclick="lipick(this)">Renewable Energy</li>
                                    <li id="li57" data-li="1" data-id="57" onclick="lipick(this)">Robotics</li>
                                    <li id="li58" data-li="1" data-id="58" onclick="lipick(this)">Rock Climbing</li>
                                    <li id="li59" data-li="1" data-id="59" onclick="lipick(this)">Rugby</li>
                                    <li id="li60" data-li="1" data-id="60" onclick="lipick(this)">Running</li>
                                    <li id="li61" data-li="1" data-id="61" onclick="lipick(this)">Sailing</li>
                                    <li id="li62" data-li="1" data-id="62" onclick="lipick(this)">Shooting</li>
                                    <li id="li63" data-li="1" data-id="63" onclick="lipick(this)">Skiing</li>
                                    <li id="li64" data-li="1" data-id="64" onclick="lipick(this)">Skydiving</li>
                                    <li id="li65" data-li="1" data-id="65" onclick="lipick(this)">Snorkeling</li>
                                    <li id="li66" data-li="1" data-id="66" onclick="lipick(this)">Snowboarding</li>
                                    <li id="li67" data-li="1" data-id="67" onclick="lipick(this)">Soccer</li>
                                    <li id="li68" data-li="1" data-id="68" onclick="lipick(this)">Social Entrepreneurship</li>
                                    <li id="li69" data-li="1" data-id="69" onclick="lipick(this)">Social movements</li>
                                    <li id="li70" data-li="1" data-id="70" onclick="lipick(this)">Software development</li>
                                    <li id="li71" data-li="1" data-id="71" onclick="lipick(this)">Spirituality</li>
                                    <li id="li72" data-li="1" data-id="72" onclick="lipick(this)">Startups</li>
                                    <li id="li73" data-li="1" data-id="73" onclick="lipick(this)">Stress relief</li>
                                    <li id="li74" data-li="1" data-id="74" onclick="lipick(this)">Studies</li>
                                    <li id="li75" data-li="1" data-id="75" onclick="lipick(this)">Surfing</li>
                                    <li id="li76" data-li="1" data-id="76" onclick="lipick(this)">Sustainability</li>
                                    <li id="li77" data-li="1" data-id="77" onclick="lipick(this)">Swimming</li>
                                    <li id="li78" data-li="1" data-id="78" onclick="lipick(this)">Theatre</li>
                                    <li id="li79" data-li="1" data-id="79" onclick="lipick(this)">Travel</li>
                                    <li id="li80" data-li="1" data-id="80" onclick="lipick(this)">Volunteering</li>
                                    <li id="li81" data-li="1" data-id="81" onclick="lipick(this)">Walking</li>
                                    <li id="li82" data-li="1" data-id="82" onclick="lipick(this)">Web Design</li>
                                    <li id="li83" data-li="1" data-id="83" onclick="lipick(this)">Web Development</li>
                                    <li id="li84" data-li="1" data-id="84" onclick="lipick(this)">Wellness</li>
                                    <li id="li85" data-li="1" data-id="85" onclick="lipick(this)">Writing</li>
                                    <li id="li86" data-li="1" data-id="86" onclick="lipick(this)">Yoga</li>
                                </ul>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button class="btn btn-sm btn-success float-right px-4" type="button" onclick="setfilter();">Filter</button>
                            </div>
                        </div>
                    </form>
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
                            ` <input class="form-control" type="date" name="fromdate">
                        </div>
                        <div class="col-6">
                            <label>To</label>
                            ` <input class="form-control" type="date" name="todate">
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
                            <input class="form-control" type="tel" name="fromprice">
                        </div>
                        <div class="col-6">
                            <input class="form-control" type="tel" name="toprice">
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
                                <li id="li<?php echo $item['id'];?>" data-li="1" data-id="<?php echo $item['id'];?>" onclick="lipick(this)">
                                    <?php echo $item['name'];?>
                                </li>
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
                    <ul class="SortByDiv">
                        <li><input type="radio" id="sortbylowtohigh" name="sortby" value="" checked="checked" onclick="setfilter();"><label for="sortbylowtohigh">Lower to higher price</label></li>
                        <li><input type="radio" id="sortbyhightolow" name="sortby" value="" onclick="setfilter();"><label for="sortbyhightolow">Higher to lower price</label></li>
                    </ul>
                    {{-- <div class="row" id="parentradio">
                        <div class="col-12 radio_parent">
                            <input class="form-control mx_radio" type="radio">
                        </div>
                        <div class="col-12 radio_parent">
                            <input class="form-control mx_radio" type="radio" name="sortby">Higher to lower price
                        </div> --}}
                        {{-- <div class="col-12 mt-3">
                            <button class="btn btn-sm btn-success float-right px-4" type="button" onclick="setfilter();">Filter</button>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- SortBy Model End --}}
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJ6FIa67coeTSo5AOBVnvjpOqyeKUNi78&callback=initialize"></script>
<script>
    $(document).ready(function () {
     if ($(window).width()<768) {
      setTimeout(function () {
         $('#map').css('display','none');
       $('.map_section').css('display','none');
      },100);
     }
   })
   function filter_btn(dt) {
     if(!$(dt).hasClass('filter_open')){
      $(dt).addClass('filter_open');
      $(dt).removeClass('filter_close');
      $('#map').hide()
      $('.map_section').hide();
      $('.list_section').hide();
      $('.list_data_section').show();
     }else{
      $(dt).addClass('filter_close');
      $(dt).removeClass('filter_open');
      $('.list_data_section').hide();
      if($('.list_map_btn').is(':checked')){
      $('#map').show();
      $('.map_section').show();
      $('.list_section').hide();
      }else{
      $('#map').hide();
      $('.map_section').hide();
      $('.list_section').show();
      }
     }
   }
   function check_filter() {
    if ($(window).width()<768) {
       $('.filter_btn').addClass('filter_close');
      $('.filter_btn').removeClass('filter_open');
      $('.list_data_section').hide();
      if($('.list_map_btn').is(':checked')){
      $('#map').show();
      $('.map_section').show();
      $('.list_section').hide();
      }else{
      $('#map').hide();
      $('.map_section').hide();
      $('.list_section').show();
      }
    }
   }
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
   if(!$(ctl).hasClass("li_select")){
      $(ctl).addClass("li_select");
      $(ctl).attr("selected","selected");
        $(this).attr("data-sel","1")
   }else{
      $(ctl).removeClass("li_select");
       $(ctl).removeAttr("selected");
        $(this).attr("data-sel","0");
   }
   
    // if (ctl.style.backgroundColor != "#12bbd4"){
    //     // ctl.style.backgroundColor = "#12bbd4";
    //     // ctl.style.border = "2px solid #1bdbf8";
    //     // ctl.style.color ="#fff";
    //     // $(ctl).css("border","2px solid #1bdbf8");
    //     // $(ctl).css("color","#fff");
    //     $(ctl).addClass("li_select");
    //     $(ctl).attr("selected","selected");
    //     $(this).attr("data-sel","1")
    // } else {
    //     // ctl.style.backgroundColor = "#ffffffe6";
    //     // ctl.style.border = "2px solid #8b8b8be6";
    //     // ctl.style.color ="#9e9e9e";
    //     // $(ctl).css("border","2px solid #8b8b8be6");
    //     // $(ctl).css("color","#9e9e9e");
    //     if($(ctl).hasClass("li_select"))
    //      {$(ctl).removeClass("li_select");}
    //     $(ctl).removeAttr("selected");
    //     $(this).attr("data-sel","0")
    // }
   }
   
   $('.switch_type input').on('change', function(){
   var dad = $(this).parent();
   if($('.filter_btn').hasClass('filter_open')){
      $('filter_btn').removeClass('filter_open');
   }
   if($(this).is(':checked')){
   dad.removeClass('switch-list');
    dad.addClass('switch-map');
    $('#map').show();
    $('.map_section').show();
   $('.list_section').hide();
   $('.list_data_section').hide();
   }
   else{
    dad.removeClass('switch-map');
    dad.addClass('switch-list');
   $('#map').hide();
    $('.map_section').hide();
   $('.list_section').show();
   $('.list_data_section').hide();
   }
   });
    
   function setfilter()
   {   check_filter();
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
    
    initialize(activity);
    
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
   var html = '<div class="card_r re-Card re-Card--compact re-Card--featured re-Card--landscape is-preloaded"><div class="re-Card-primary"><div class="react-Slidy react-Slidy--fullWidth image-grid"><a href="'+url+'/'+id+'" target="_blank"><img class="re-Card-image image-fit-img" src="' +imagepath+'/'+image+'"></a>   </div></div><div class="re-Card-secondary"><table class="table table-borderless" style="width: 100%"><tbody><tr class="mx_city"><td><span class="text-left small text-muted text-uppercase" style="font-size: 70%;"><i class="fa fa-map-marker"></i>&nbsp;'+district+', '+city+'</span><br><a href="'+url+'/'+id+'" target="_blank">'+name+'</a></td></tr><tr class="mx_list"><td><span class="text-left small text-muted text-uppercase">Common language</span><br>'+language+'</td></tr><tr class="mx_list"><td><span class="text-left small text-muted text-uppercase">Purpose</span><br>'+activity1+'</td></tr> <tr class="mx_list"><td><span class="text-left small text-muted text-uppercase">Food</span><br><span>'+diet+'</span></td></tr><tr class="mx_list"><td><span class="text-left small text-muted text-uppercase">Opportunities</span><br>'+activity2+'</td></tr><tr class="mx_list"><td><span class="text-left small text-muted text-uppercase">Montly</span><br><span>'+currrency+', '+rent+'</span></td></tr></tbody></table></div></div>';  
    // html += '<div class="row">';    
    //     html += '<div class="col-4">';
    //         html += '<a href="'+url+'/'+id+'" target="_blank"><img height="150px" src="' +imagepath+'/'+image+'"></a>'; 
    //     html += '</div>';
    //     html += '<div class="col-8 ">';
    //         html += '<table class="table table-borderless" style="width: 100%">';
    //             html += '<tbody>';
    //             html += '<tr class="mx_city">';
    //                 html += '<td><span class="text-left small text-muted text-uppercase">'+district+', '+city+'</span><br><a href="'+url+'/'+id+'" target="_blank">'+name+'</a></td>';
    //             html += '</tr>';
    //             html += '<tr class="mx_list">';
    //                 html += '<td><span class="text-left small text-muted text-uppercase">Common language</span><br>'+language+'</td>';
    //             html += '</tr>';
    //             html += '<tr class="mx_list">';
    //                 html += '<td><span class="text-left small text-muted text-uppercase">Purpose</span><br>'+activity1+'</td>';
    //             html += '</tr>';
    //             html += '<tr class="mx_list">';
    //                 html += '<td><span class="text-left small text-muted text-uppercase">Food</span><br><span>'+diet+'</span></td>';
    //             html += '</tr>';
    //             html += '<tr class="mx_list">';
    //                 html += '<td><span class="text-left small text-muted text-uppercase">Opportunities</span><br>'+activity2+'</td>';
    //             html += '</tr>';
    //             html += '<tr class="mx_list">';
    //                 html += '<td><span class="text-left small text-muted text-uppercase">Montly</span><br><span> '+currrency+', '+rent+'</span></td>';
    //             html += '</tr>';
    //             html += '</tbody>';
    //         html += '</table>';
    //       html += '</div>';
    // html += '</div>';
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
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
<style type="text/css">
ul.tags {
    list-style: none;
}

ul.tags li {
    display: inline;
    margin: 2px;
}

ul.tags li {
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 2px solid rgba(139, 139, 139, .9);
    font-size: 13px;
    color: #9e9e9e;
    border-radius: 25px;
    padding: 0px 5px;
    white-space: nowrap;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.tags li.li_select {
    background-color: #12bbd4;
    border: 2px solid #1bdbf8;
    color: #fff;
}

ul.tags li {
    cursor: pointer;
}

.filter_open {
    background-color: #12bbd4;
    border: 1px solid #1bdbf8;
    color: #fff;
}

.filter_close {
    background-color: #fff;
    border: 1px solid #e4e6e7;
    color: #212529;
}

.switch_type {
    position: relative;
    display: inline-block;
    width: 80px;
    height: 37px;
    border-radius: 37px;
    background-color: #f3f4f4;
    cursor: pointer;
    transition: all .3s;
    overflow: hidden;
    box-shadow: 0px 0px 2px rgba(0, 0, 0, .3);
}

.switch_type input {
    display: none;
}

.switch_type input:checked+div {
    left: calc(80px - 32px);
    box-shadow: 0px 0px 0px white;
}

.switch_type div {
    position: absolute;
    width: 27px;
    height: 27px;
    border-radius: 27px;
    background-color: white;
    top: 5px;
    left: 5px;
    box-shadow: 0px 0px 1px rgb(150, 150, 150);
    transition: all .3s;
}

.switch_type div:before,
.switch_type div:after {
    position: absolute;
    content: 'List';
    width: calc(80px - 40px);
    height: 37px;
    line-height: 37px;
    font-family: 'Varela Round';
    font-size: 14px;
    font-weight: bold;
    top: -5px;
    color: rgb(120, 120, 120);
}

.switch_type div:before {
    content: 'Map';
    color: white;
    left: 100%;
    padding-left: 2px;
}

.switch_type div:after {
    content: 'List';
    right: 100%;
    color: rgb(120, 120, 120);
}

.switch-list {
    background-color: #e74c3c;
    box-shadow: none;
}

.filter_btn {
    display: none;
}

.switch_type {
    display: none;
}

@media screen and (max-width:767px) {
    .filter_section {
        position: fixed;
        background: #fff;
        z-index: 999;
        width: 105vw;
        margin: 0;
        margin-left: -30px;
        top: 67px;
    }

    main#at-main {
        margin-top: 60px;
    }

    div#map {
        height: calc(100vh - 120px);
    }

    .list_data_section {
        display: none;
    }

    .navbar-nav {
        margin-top: 55px;
    }

    .filter_btn {
        display: inline-block;
    }

    .switch_type {
        display: inline-block;
    }

    .at-properties-listing tr.mx_list {
        width: 100%;
    }
}

l.SortByDiv {
    list-style: none;
    padding: 20px;
}

ul.SortByDiv li {
    display: inline;
}

ul.SortByDiv li label {
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 2px solid rgba(139, 139, 139, .3);
    color: #adadad;
    border-radius: 25px;
    white-space: nowrap;
    margin: 3px 0px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.SortByDiv li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.SortByDiv li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.SortByDiv li input[type="radio"]:checked+label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
}

ul.SortByDiv li input[type="radio"]:checked+label {
    border: 2px solid #1bdbf8;
    background-color: #12bbd4;
    color: #fff;
    transition: all .2s;
}

ul.SortByDiv li input[type="radio"] {
    display: absolute;
}

ul.SortByDiv li input[type="radio"] {
    position: absolute;
    opacity: 0;
}

ul.SortByDiv li input[type="radio"]:focus+label {
    border: 2px solid #e9a1ff;
}

@media all {
    .sui-AtomButton {
        border-radius: 2px;
    }

    .sui-AtomButton--large {
        border-radius: 2px;
    }

    .re-CardFeatures-wrapper {
        -webkit-align-items: flex-start;
        align-items: flex-start;
        display: -webkit-flex;
        display: flex;
        margin-top: 2px;
    }

    .re-CardFeatures-feature {
        color: #353535;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: -.6px;
        padding: 0;
    }

    .re-CardFeatures-feature:not(:first-child):before {
        content: " · ";
        margin: 0 4px;
    }

    .re-CardFeatures-feature:last-child {
        margin-right: 8px;
    }

    .react-Slidy {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        background: transparent;
        min-height: 50px;
        position: relative;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .react-Slidy-arrow {
        -webkit-align-items: center;
        align-items: center;
        bottom: 0;
        display: -webkit-flex;
        display: flex;
        margin: auto 0;
        opacity: 0;
        position: absolute;
        top: 0;
        transition: opacity .3s ease;
        width: auto;
        z-index: 1;
    }

    .react-Slidy-arrowLeft {
        left: 0;
    }

    .react-Slidy-arrowRight {
        right: 0;
    }

    @media screen and (max-width:850px) {
        .react-Slidy-arrow {
            display: none;
        }
    }

    .react-Slidy--fullWidth img {
        width: 100%;
    }

    .react-Slidy:hover>.react-Slidy-arrow {
        opacity: 1;
    }

    .react-Slidy:hover>.react-Slidy-arrow[disabled] {
        opacity: .2;
    }

    .react-Slidy>img {
        font-size: 0;
        max-height: 100%;
        overflow: hidden;
        position: relative;
        transition: all 1s ease-in-out;
        white-space: nowrap;
        width: 100%;
    }

    .react-Slidy> {
        display: block;
        list-style: none;
        padding: 0;
        width: 100%;
        will-change: transform, transition-timing, transition-duration;
    }

    .react-Slidy> {
        display: inline-block;
        position: relative;
        vertical-align: middle;
        width: 100%;
    }

    .react-Slidy>img {
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .react-Slidy>img {
        -webkit-backface-visibility: hidden;
        -webkit-perspective: 1000;
        display: block;
        height: auto;
        margin: 0 auto;
        max-width: 100%;
        pointer-events: none;
        touch-action: none;
    }

    .re-Card-label {
        -webkit-align-items: center;
        align-items: center;
        border-radius: 16px;
        color: #fff;
        display: -webkit-inline-flex;
        display: inline-flex;
        font-size: 10px;
        font-weight: 600;
        height: 20px;
        letter-spacing: -.42px;
        margin-right: 4px;
        padding: 2px 8px;
        text-transform: uppercase;
    }

    .re-Card-label--top {
        background: #fff;
        color: #353535;
    }

    .re-Card-label--opportunity {
        background: #fe4f51;
        color: #f8f8f8;
    }

    .re-Card-label--newBuild {
        background: #fff;
        color: #353535;
    }

    .re-Card-labels {
        -webkit-align-items: flex-start;
        align-items: flex-start;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
        left: 8px;
        pointer-events: none;
        position: absolute;
        right: 8px;
        top: 8px;
        z-index: 1;
    }

    .re-Card-labelsRight {
        -webkit-align-items: flex-end;
        align-items: flex-end;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        margin-left: auto;
    }

    .re-Card-labelsRight .re-Card-label {
        margin-bottom: 8px;
        margin-right: 0;
    }

    .re-Card-photosCounter {
        background: rgba(29, 29, 29, .5);
        border-radius: 16px;
        font-size: 12px;
        height: 24px;
        padding: 2px 8px;
    }

    .re-Card-photosCounter,
    .re-Card-priceContainer {
        -webkit-align-items: center;
        align-items: center;
        display: -webkit-flex;
        display: flex;
    }

    .re-Card-priceContainer {
        line-height: 1.2;
        margin-bottom: 4px;
        max-height: 100%;
        text-align: left;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .re-Card-price {
        display: inline-block;
        margin: 0;
        position: relative;
        white-space: nowrap;
    }

    @media screen and (max-width:685px) {
        .re-Card-price {
            display: block;
        }
    }

    .re-Card-priceComposite {
        -webkit-align-items: baseline;
        align-items: baseline;
        color: #353535;
        display: -webkit-flex;
        display: flex;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -1px;
        margin-right: 4px;
    }

    .re-Card-price--featured {
        font-weight: 600;
    }

    .re-Card .re-Card-sliderArrow {
        background: hsla(0, 0%, 100%, .7);
        border-radius: 20px;
        display: -webkit-flex;
        display: flex;
        height: 40px;
        -webkit-justify-content: center;
        justify-content: center;
        margin: auto 8px;
        width: 40px;
    }

    .re-Card .re-Card-sliderArrow:hover {
        background: #fff;
    }

    .re-Card .re-Card-sliderArrow:after {
        border-right: 2px solid #5f5f5f;
        border-top: 2px solid #5f5f5f;
        content: "";
        height: 14px;
        width: 14px;
    }

    .re-Card .re-Card-sliderArrow--left:after {
        -webkit-transform: translateX(3px) rotate(-135deg);
        transform: translateX(3px) rotate(-135deg);
    }

    .re-Card .re-Card-sliderArrow--right:after {
        -webkit-transform: translateX(-3px) rotate(45deg);
        transform: translateX(-3px) rotate(45deg);
    }

    .re-Card-promotionLogo {
        background-color: #fff;
        border-radius: 8px;
        border: 1px solid #f1f1f1;
        min-height: 44px;
        overflow: hidden;
        position: absolute;
        right: 16px;
        top: -32px;
        width: 88px;
        z-index: 1;
    }

    .re-Card-promotionLogo img {
        display: block;
        max-height: 100px;
        min-height: inherit;
        width: 100%;
    }

    .re-Card-secondary {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        padding: 0;
        position: relative;
        -webkit-flex-grow: 2;
        flex-grow: 2;
    }

    .re-Card {
        -webkit-animation: fadeIn .6s;
        animation: fadeIn .6s;
        border-bottom: 1px solid #dcdcdc;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        padding-bottom: 16px;
        width: 100%;
        min-width: 0;
    }

    .re-Card.is-preloaded {
        -webkit-animation: none;
        animation: none;
    }

    @media (pointer:fine) {
        .re-Card:hover {
            cursor: pointer;
        }
    }

    .re-Card-contact {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-shrink: 0;
        flex-shrink: 0;
        height: 40px;
    }

    .re-Card-contact>* {
        -webkit-flex-grow: 1;
        flex-grow: 1;
        max-height: 100%;
    }

    .re-Card-contact>*+* {
        margin-left: 4px;
    }

    .re-Card-contact .re-Card-favoriteButton {
        -webkit-flex-grow: 0;
        flex-grow: 0;
        -webkit-flex-shrink: 0;
        flex-shrink: 0;
    }

    .re-Card-favoriteButton {
        -webkit-flex-grow: 0;
        flex-grow: 0;
        -webkit-flex-shrink: 0;
        flex-shrink: 0;
        max-width: 60px;
    }

    .re-Card-image,
    .re-Card .react-Slidy {
        background: #ddd;
        height: 100%;
        max-height: 280px;
        min-height: 199px;
    }

    @media screen and (max-width:520px) {

        .re-Card-image,
        .re-Card .react-Slidy {
            max-height: 290px;
            min-height: 245px;
        }
    }

    .re-Card-primary {
        border-radius: 16px;
        position: relative;
        overflow: hidden;
    }

    .re-Card-image {
        display: block;
        height: auto;
        width: 100%;
        max-height: 245px;
    }

    @media screen and (max-width:685px) {
        .re-Card-image {
            min-height: 265px;
            max-height: 265px;
        }
    }

    .re-Card--featured {
        background-color: #eaebf7;
        border-bottom: none;
        border-radius: 16px;
    }

    .re-Card--featured .re-Card-secondary {
        padding: 0 16px;
    }

    .re-Card-description {
        display: none;
    }

    .re-Card-title {
        color: #353535;
        display: block;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: -.6px;
        margin: 2px 0 0;
        overflow: hidden;
        padding-bottom: 4px;
        text-decoration: none;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
    }

    .re-Card-title>span {
        font-weight: 600;
    }

    .re-Card-title>span:after {
        content: " · ";
        margin: 0 2px;
    }

    .re-Card-bumpdate {
        color: #5f5f5f;
        display: inline-block;
        font-size: 12px;
        letter-spacing: -.5px;
        margin-top: 4px;
        padding-bottom: 4px;
        pointer-events: none;
        position: relative;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    @media screen and (min-width:685px)and (max-width:850px) {
        .re-Card-bumpdate {
            display: none;
        }

        /* #map_div{display: inline-block;}
   #map{display: inline-block;}*/
    }

    .re-Card-bumpdate:first-letter {
        text-transform: uppercase;
    }

    .re-Card-link {
        color: #4d4d4d;
        padding: 16px 0 4px;
        text-decoration: none;
        -webkit-flex-grow: 2;
        flex-grow: 2;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
    }

    .re-Card-multimediaCounter {
        -webkit-align-items: center;
        align-items: center;
        bottom: 8px;
        color: #fff;
        display: -webkit-flex;
        display: flex;
        font-size: 12px;
        font-weight: 400;
        height: 24px;
        left: 8px;
        letter-spacing: 1px;
        position: absolute;
        z-index: 1;
    }

    @media screen and (min-width:620px) {
        .re-Card--landscape {
            -webkit-flex-direction: row;
            flex-direction: row;
        }

        .re-Card--landscape .re-Card-image,
        .re-Card--landscape .react-Slidy {
            height: 100%;
            max-height: none;
            min-height: 265px;
        }

        .re-Card--landscape .re-Card-promotionLogo {
            border: 1px solid #f1f1f1;
            bottom: auto;
            display: block;
            left: auto;
            margin: 16px;
            right: 0;
            top: 0;
        }

        .re-Card--landscape .re-Card-primary {
            height: 100%;
            margin-right: 32px;
            max-width: 412px;
            width: 100%;
        }

        .re-Card--landscape .re-Card-secondary {
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
            padding: 16px 0;
            text-align: left;
        }

        .re-Card--landscape .re-Card-wrapperTitle {
            display: -webkit-flex;
            display: flex;
            overflow: hidden;
            width: 100%;
        }

        .re-Card--landscape .re-Card-bumpdate {
            bottom: 24px;
            -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-flex: 1 0 46%;
            flex: 1 0 46%;
            margin: 0 16px;
            min-width: 0;
            -webkit-order: 2;
            order: 2;
            overflow: initial;
            padding: 0;
            position: absolute;
            right: 0;
            text-align: right;
            text-overflow: clip;
            width: 100%;
        }

        .re-Card--landscape .re-Card-timeago {
            white-space: nowrap;
        }

        .re-Card--landscape .re-Card-link {
            -webkit-flex-grow: 0;
            flex-grow: 0;
            padding: 0;
        }

        .re-Card--landscape .re-Card-description {
            color: #5f5f5f;
            font-size: 14px;
            letter-spacing: -.6px;
            line-height: 1.3;
            margin: 0 16px 0 0;
            max-width: 625px;
            overflow-y: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .re-Card--landscape .re-Card-title {
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
        }

        .re-Card--landscape .re-Card-contact {
            margin-top: auto;
            margin-right: 88px;
        }

        .re-Card--landscape.re-Card--featured {
            margin-bottom: 16px;
            padding-bottom: 0;
        }

        .re-Card--landscape.re-Card--featured:after {
            border-bottom: 1px solid #dcdcdc;
            content: "";
            display: block;
            margin-top: 16px;
        }

        .re-Card--landscape.re-Card--featured .re-Card-secondary {
            padding-left: 0;
        }

        .re-Card--landscape.re-Card--compact .re-Card-primary {
            margin-right: 16px;
            max-width: 372px;
        }

        .re-Card--landscape.re-Card--compact .re-Card-description {
            max-width: 412px;
        }
    }

    .react-Slidy {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        background: transparent;
        min-height: 50px;
        position: relative;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .react-Slidy-arrow {
        -webkit-align-items: center;
        align-items: center;
        bottom: 0;
        display: -webkit-flex;
        display: flex;
        margin: auto 0;
        opacity: 0;
        position: absolute;
        top: 0;
        transition: opacity .3s ease;
        width: auto;
        z-index: 1;
    }

    .react-Slidy-arrowLeft {
        left: 0;
    }

    .react-Slidy-arrowRight {
        right: 0;
    }

    @media screen and (max-width:850px) {
        .react-Slidy-arrow {
            display: none;
        }
    }

    .react-Slidy--fullWidth img {
        width: 100%;
    }

    .react-Slidy:hover>.react-Slidy-arrow {
        opacity: 1;
    }

    .react-Slidy:hover>.react-Slidy-arrow[disabled] {
        opacity: .2;
    }

    .react-Slidy>div {
        font-size: 0;
        max-height: 100%;
        overflow: hidden;
        position: relative;
        transition: all 1s ease-in-out;
        white-space: nowrap;
        width: 100%;
    }

    .react-Slidy> {
        display: block;
        list-style: none;
        padding: 0;
        width: 100%;
        will-change: transform, transition-timing, transition-duration;
    }

    .react-Slidy> {
        display: inline-block;
        position: relative;
        vertical-align: middle;
        width: 100%;
    }

    .react-Slidy>,
    .react-Slidy>div img {
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .react-Slidy>div img {
        -webkit-backface-visibility: hidden;
        -webkit-perspective: 1000;
        display: block;
        height: auto;
        margin: 0 auto;
        max-width: 100%;
        pointer-events: none;
        touch-action: none;
    }

    .re-Card-label {
        -webkit-align-items: center;
        align-items: center;
        border-radius: 16px;
        color: #fff;
        display: -webkit-inline-flex;
        display: inline-flex;
        font-size: 10px;
        font-weight: 600;
        height: 20px;
        letter-spacing: -.42px;
        margin-right: 4px;
        padding: 2px 8px;
        text-transform: uppercase;
    }

    .re-Card-label--top {
        background: #fff;
        color: #353535;
    }

    .re-Card-label--opportunity {
        background: #fe4f51;
        color: #f8f8f8;
    }

    .re-Card-label--newBuild {
        background: #fff;
        color: #353535;
    }

    .re-Card-labels {
        -webkit-align-items: flex-start;
        align-items: flex-start;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
        left: 8px;
        pointer-events: none;
        position: absolute;
        right: 8px;
        top: 8px;
        z-index: 1;
    }

    .re-Card-labelsRight {
        -webkit-align-items: flex-end;
        align-items: flex-end;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        margin-left: auto;
    }

    .re-Card-labelsRight .re-Card-label {
        margin-bottom: 8px;
        margin-right: 0;
    }

    .re-Card-photosCounter {
        background: rgba(29, 29, 29, .5);
        border-radius: 16px;
        font-size: 12px;
        height: 24px;
        padding: 2px 8px;
    }

    .re-Card-photosCounter,
    .re-Card-priceContainer {
        -webkit-align-items: center;
        align-items: center;
        display: -webkit-flex;
        display: flex;
    }

    .re-Card-priceContainer {
        line-height: 1.2;
        margin-bottom: 4px;
        max-height: 100%;
        text-align: left;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .re-Card-price {
        display: inline-block;
        margin: 0;
        position: relative;
        white-space: nowrap;
    }

    @media screen and (max-width:685px) {
        .re-Card-price {
            display: block;
        }
    }

    .re-Card-priceComposite {
        -webkit-align-items: baseline;
        align-items: baseline;
        color: #353535;
        display: -webkit-flex;
        display: flex;
        font-size: 24px;
        font-weight: 700;
        letter-spacing: -1px;
        margin-right: 4px;
    }

    .re-Card-price--featured {
        font-weight: 600;
    }

    .re-Card .re-Card-sliderArrow {
        background: hsla(0, 0%, 100%, .7);
        border-radius: 20px;
        display: -webkit-flex;
        display: flex;
        height: 40px;
        -webkit-justify-content: center;
        justify-content: center;
        margin: auto 8px;
        width: 40px;
    }

    .re-Card .re-Card-sliderArrow:hover {
        background: #fff;
    }

    .re-Card .re-Card-sliderArrow:after {
        border-right: 2px solid #5f5f5f;
        border-top: 2px solid #5f5f5f;
        content: "";
        height: 14px;
        width: 14px;
    }

    .re-Card .re-Card-sliderArrow--left:after {
        -webkit-transform: translateX(3px) rotate(-135deg);
        transform: translateX(3px) rotate(-135deg);
    }

    .re-Card .re-Card-sliderArrow--right:after {
        -webkit-transform: translateX(-3px) rotate(45deg);
        transform: translateX(-3px) rotate(45deg);
    }

    .re-Card-promotionLogo {
        background-color: #fff;
        border-radius: 8px;
        border: 1px solid #f1f1f1;
        min-height: 44px;
        overflow: hidden;
        position: absolute;
        right: 16px;
        top: -32px;
        width: 88px;
        z-index: 1;
    }

    .re-Card-promotionLogo img {
        display: block;
        max-height: 100px;
        min-height: inherit;
        width: 100%;
    }

    .re-Card-secondary {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        -webkit-justify-content: space-between;
        justify-content: space-between;
        padding: 0;
        position: relative;
        -webkit-flex-grow: 2;
        flex-grow: 2;
    }

    .re-Card {
        -webkit-animation: fadeIn .6s;
        animation: fadeIn .6s;
        border-bottom: 1px solid #dcdcdc;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
        padding-bottom: 16px;
        width: 100%;
        min-width: 0;
    }

    .re-Card.is-preloaded {
        -webkit-animation: none;
        animation: none;
    }

    @media (pointer:fine) {
        .re-Card:hover {
            cursor: pointer;
        }
    }

    .re-Card-contact {
        display: -webkit-flex;
        display: flex;
        -webkit-flex-shrink: 0;
        flex-shrink: 0;
        height: 40px;
    }

    .re-Card-contact>* {
        -webkit-flex-grow: 1;
        flex-grow: 1;
        max-height: 100%;
    }

    .re-Card-contact>*+* {
        margin-left: 4px;
    }

    .re-Card-contact .re-Card-favoriteButton {
        -webkit-flex-grow: 0;
        flex-grow: 0;
        -webkit-flex-shrink: 0;
        flex-shrink: 0;
    }

    .re-Card-favoriteButton {
        -webkit-flex-grow: 0;
        flex-grow: 0;
        -webkit-flex-shrink: 0;
        flex-shrink: 0;
        max-width: 60px;
    }

    .re-Card-image,
    .re-Card .react-Slidy {
        background: #ddd;
        height: 100%;
        max-height: 280px;
        min-height: 199px;
    }

    @media screen and (max-width:520px) {

        .re-Card-image,
        .re-Card .react-Slidy {
            max-height: 290px;
            min-height: 245px;
        }
    }

    .re-Card-primary {
        border-radius: 16px;
        position: relative;
        overflow: hidden;
    }

    .re-Card-image {
        display: block;
        height: auto;
        width: 100%;
        max-height: 245px;
    }

    @media screen and (max-width:685px) {
        .re-Card-image {
            min-height: 265px;
            max-height: 265px;
        }

        /* #map_div{visibility: hidden;}
   #map{visibility: hidden;}*/
    }

    .re-Card--featured {
        background-color: #eaebf7;
        border-bottom: none;
        border-radius: 16px;
    }

    .re-Card--featured .re-Card-secondary {
        padding: 0 16px;
    }

    .re-Card-description {
        display: none;
    }

    .re-Card-title {
        color: #353535;
        display: block;
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: -.6px;
        margin: 2px 0 0;
        overflow: hidden;
        padding-bottom: 4px;
        text-decoration: none;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
    }

    .re-Card-title>span {
        font-weight: 600;
    }

    .re-Card-title>span:after {
        content: " · ";
        margin: 0 2px;
    }

    .re-Card-bumpdate {
        color: #5f5f5f;
        display: inline-block;
        font-size: 12px;
        letter-spacing: -.5px;
        margin-top: 4px;
        padding-bottom: 4px;
        pointer-events: none;
        position: relative;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    @media screen and (min-width:685px)and (max-width:850px) {
        .re-Card-bumpdate {
            display: none;
        }
    }

    .re-Card-bumpdate:first-letter {
        text-transform: uppercase;
    }

    .re-Card-link {
        color: #4d4d4d;
        padding: 16px 0 4px;
        text-decoration: none;
        -webkit-flex-grow: 2;
        flex-grow: 2;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: column;
        flex-direction: column;
    }

    .re-Card-multimediaCounter {
        -webkit-align-items: center;
        align-items: center;
        bottom: 8px;
        color: #fff;
        display: -webkit-flex;
        display: flex;
        font-size: 12px;
        font-weight: 400;
        height: 24px;
        left: 8px;
        letter-spacing: 1px;
        position: absolute;
        z-index: 1;
    }

    @media screen and (min-width:620px) {
        .re-Card--landscape {
            -webkit-flex-direction: row;
            flex-direction: row;
        }

        .re-Card--landscape .re-Card-image,
        .re-Card--landscape .react-Slidy {
            height: 100%;
            max-height: none;
            min-height: 265px;
        }

        .re-Card--landscape .re-Card-promotionLogo {
            border: 1px solid #f1f1f1;
            bottom: auto;
            display: block;
            left: auto;
            margin: 16px;
            right: 0;
            top: 0;
        }

        .re-Card--landscape .re-Card-primary {
            height: 100%;
            margin-right: 32px;
            max-width: 412px;
            width: 100%;
        }

        .re-Card--landscape .re-Card-secondary {
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
            padding: 16px 0;
            text-align: left;
        }

        .re-Card--landscape .re-Card-wrapperTitle {
            display: -webkit-flex;
            display: flex;
            overflow: hidden;
            width: 100%;
        }

        .re-Card--landscape .re-Card-bumpdate {
            bottom: 24px;
            -webkit-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-flex: 1 0 46%;
            flex: 1 0 46%;
            margin: 0 16px;
            min-width: 0;
            -webkit-order: 2;
            order: 2;
            overflow: initial;
            padding: 0;
            position: absolute;
            right: 0;
            text-align: right;
            text-overflow: clip;
            width: 100%;
        }

        .re-Card--landscape .re-Card-timeago {
            white-space: nowrap;
        }

        .re-Card--landscape .re-Card-link {
            -webkit-flex-grow: 0;
            flex-grow: 0;
            padding: 0;
        }

        .re-Card--landscape .re-Card-description {
            color: #5f5f5f;
            font-size: 14px;
            letter-spacing: -.6px;
            line-height: 1.3;
            margin: 0 16px 0 0;
            max-width: 625px;
            overflow-y: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .re-Card--landscape .re-Card-title {
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
        }

        .re-Card--landscape .re-Card-contact {
            margin-top: auto;
            margin-right: 88px;
        }

        .re-Card--landscape.re-Card--featured {
            margin-bottom: 16px;
            padding-bottom: 0;
        }

        .re-Card--landscape.re-Card--featured:after {
            border-bottom: 1px solid #dcdcdc;
            content: "";
            display: block;
            margin-top: 16px;
        }

        .re-Card--landscape.re-Card--featured .re-Card-secondary {
            padding-left: 0;
        }

        .re-Card--landscape.re-Card--compact .re-Card-primary {
            margin-right: 16px;
            max-width: 372px;
        }

        .re-Card--landscape.re-Card--compact .re-Card-description {
            max-width: 412px;
        }
    }

    .re-CardFeatures-wrapper {
        -webkit-align-items: flex-start;
        align-items: flex-start;
        display: -webkit-flex;
        display: flex;
        margin-top: 2px;
    }

    .re-CardFeatures-feature {
        color: #353535;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: -.6px;
        padding: 0;
    }

    .re-CardFeatures-feature:not(:first-child):before {
        content: " · ";
        margin: 0 4px;
    }

    .re-CardFeatures-feature:last-child {
        margin-right: 8px;
    }

    .sui-AtomButton {
        background: none;
        cursor: pointer;
        font-family: inherit;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border-radius: 8px;
        border: 1px solid;
        box-sizing: border-box;
        display: inline-block;
        position: relative;
        font-family: Open Sans, Helvetica, sans-serif;
        font-size: 14px;
        font-weight: 600;
        height: 40px;
        line-height: normal;
        min-width: 40px;
        outline: 0;
        padding: 0 16px;
        text-decoration: none;
        text-transform: none;
        white-space: nowrap;
    }

    .sui-AtomButton:focus {
        outline: 0;
    }

    .sui-AtomButton .sui-AtomButton-leftIcon,
    .sui-AtomButton .sui-AtomButton-leftIcon [class*=Icon] {
        height: 16px;
        width: 16px;
    }

    .sui-AtomButton .sui-AtomButton-leftIcon {
        margin-right: 8px;
    }

    .sui-AtomButton+.sui-AtomButton {
        margin-left: 8px;
    }

    .sui-AtomButton-inner {
        -webkit-align-items: center;
        align-items: center;
        display: -webkit-inline-flex;
        display: inline-flex;
        height: 100%;
        pointer-events: none;
    }

    .sui-AtomButton-leftIcon,
    .sui-AtomButton-leftIcon .sui-AtomIcon {
        display: -webkit-inline-flex;
        display: inline-flex;
    }

    .sui-AtomButton-leftIcon svg {
        fill: currentColor;
        stroke: currentColor;
    }

    .sui-AtomButton--primary.sui-AtomButton--flat,
    .sui-AtomButton--primary.sui-AtomButton--outline {
        border-color: #303ab2;
        color: #303ab2;
        -webkit-text-decoration-line: none;
        text-decoration-line: none;
    }

    .sui-AtomButton--primary.sui-AtomButton--flat:active,
    .sui-AtomButton--primary.sui-AtomButton--outline:active {
        background: #eaebf7;
    }

    @media (min-width:992px) {

        .re-Searchpage .re-Searchresult-wrapper .re-Card-image,
        .re-Searchpage .re-Searchresult-wrapper .re-Card .react-Slidy {
            min-height: 245px;
        }
    }

    .image-grid {
        display: flex;
        flex-wrap: wrap;
        max-width: 920px;
    }

    /** Object-fit */
    .image-fit {
        flex: 0 0 auto;
        margin: 5px;
        position: relative;
        width: calc(25% - 10px);
    }

    .image-fit-placeholder {
        height: 100%;
        visibility: hidden;
        width: 100%;
    }

    .image-fit-img {
        bottom: 0;
        height: 100%;
        left: 0;
        object-fit: cover;
        object-position: center;
        position: absolute;
        right: 0;
        top: 0;
        width: 100%;
    }
</style>
@endsection