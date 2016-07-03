<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
<!--        <link rel="stylesheet" href="./css/ionicons.min.css">-->
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">-->
        
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <style>
.airline {
  list-style: none;
  margin: 25px 0 22px;
  padding: 0;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.airline:after {
  border: 6px solid;
  border-top-width: 13px;
/*  border-color: #00c4f3 transparent transparent transparent;*/
  border-color: #046880 transparent transparent transparent;
  content: "";
  display: block;
  position: absolute;
  bottom: -19px;
  left: 15px;
}

.airline-horizontal:after {
  border-top-width: 6px;
  border-left-width: 13px;
  border-color: transparent transparent transparent #00c4f3;
  top: 15px;
  right: 0;
  bottom: auto;
  left: auto;
}
.airline-horizontal .airline-milestone {
  border-top: 2px solid #00c4f3;
  display: inline;
  float: left;
  margin: 20px 0 0 0;
  padding: 40px 0 0 0;
}
.airline-horizontal .airline-milestone:before {
  top: -17px;
  left: auto;
}
.airline-horizontal .airline-milestone.is-take-off:after {
  top: -17px;
  left: 0;
}

.airline-milestone {
/*  border-left: 2px solid #00c4f3;*/
  border-left: 2px solid #046880;
  margin: 0 0 0 20px;
  padding: 0 0 5px 25px;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.airline-milestone:before {
  border: 7px solid #00c4f3;
  border-radius: 50%;
  content: "";
  display: block;
  position: absolute;
  left: -17px;
  width: 32px;
  height: 32px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.airline-milestone.is-cancel:after,
.airline-milestone.is-delay:after,
.airline-milestone.is-flying:after,
.airline-milestone.is-arrived:after,
.airline-milestone.is-take-off:after {
  color: #FFF;
  content: "\f072";
  display: block;
  font-family: "FontAwesome";
  line-height: 32px;
  position: absolute;
  top: 0;
  left: -17px;
  text-align: center;
  width: 32px;
  height: 32px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
 
}
.airline-milestone.is-cancel:before,
.airline-milestone.is-delay:before{
    background-color:#f0ad4e;
/*    background-color:#8DACB8;*/
    border: 0;
}
.airline-milestone.is-take-off:before,
.airline-milestone.is-arrived:before,
.airline-milestone.is-flying:before {
/*  background-color: #EEE;*/
  background-color: #00c4f3;
    
}
.airline-milestone.is-delay:after,
.airline-milestone.is-flying:after{
     /*rotate*/    
    transform:rotate(135deg);
    -ms-transform:rotate(135deg); /* Internet Explorer */
    -moz-transform:rotate(135deg); /* Firefox */
    -webkit-transform:rotate(135deg); /* Safari 和 Chrome */
    -o-transform:rotate(135deg); /* Opera */
}            

.airline-milestone.is-cancel:after,
.airline-milestone.is-arrived:after {
    transform:rotate(200deg);
    -ms-transform:rotate(200deg); /* Internet Explorer */
    -moz-transform:rotate(200deg); /* Firefox */
    -webkit-transform:rotate(200deg); /* Safari 和 Chrome */
    -o-transform:rotate(200deg); /* Opera */
}            
.airline-milestone.is-delay .airline-action .airline-title {
  color: #f0ad4e;
/*  color: #3ad6fb;*/
}

.airline-action {
  background-color: #FFF;
  padding: 12px 10px 12px 20px;
  position: relative;
  top: -15px;
}
.airline-action.is-expandable .airline-title {
  cursor: pointer;
  position: relative;
}
.airline-action.is-expandable .airline-title:focus {
  outline: 0;
  text-decoration: underline;
}
.airline-action.is-expandable .airline-title:after {
  border: 6px solid #666;
  border-color: transparent transparent transparent #666;
  content: "";
  display: block;
  position: absolute;
  top: 6px;
  right: 0;
}
.airline-action.is-expandable .airline-content {
  display: none;
}
.airline-action.is-expandable.is-expanded .airline-title:after {
  border-color: #666 transparent transparent transparent;
  top: 10px;
  right: 5px;
}
.airline-action.is-expandable.is-expanded .airline-content {
  display: block;
}
.airline-action .airline-title, .airline-action .airline-content {
  word-wrap: break-word;
}
.airline-action .airline-title {
  color: #00c4f3;
  font-size: 18px;
  margin: 0;
}
.airline-action .date {
  display: block;
  font-size: 14px;
  margin-bottom: 15px;
}
.airline-action .airline-content {
  font-size: 14px;
}

.file-list {
  line-height: 1.4;
  list-style: none;
  padding-left: 10px;
}

body {
  background-color: #EEE;
  font-family: Helvetica, Arial, Verdana, sans-serif;
}

.airline-page {
  max-width: 1200px;
  margin: 40px 30px;
}

a {
  color: #00c4f3;
  text-decoration: none;
}
a:hover, a:focus {
  text-decoration: underline;
}

.video-link:before {
  content: "\f03d";
  display: inline-block;
  font-family: "FontAwesome";
  margin-right: 5px;
}

a[href*=".pdf"]:before {
  content: "\f0f6";
  display: inline-block;
  font-family: "FontAwesome";
  margin-right: 8px;
}
.loading .hide{
    display:none;
}            
.loading{
    width: 100%;
    text-align: center;
    margin: 150px auto;
}
.loading i{
    font-size: 3em;
    color: rgba(0, 0, 0, .5);    
}
.zql{
background: #124;
}            
        </style>
    </head>
    <body>
        <div data-toggle="modal" data-target="#plane-search-modal">
            <h1>点我</h1>
        </div>

        <div class="modal fade" role="dialog" aria-labelledby="planeGridSlabel" id="plane-search-modal">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="planeGridSlabel">查询结果</h4>
              </div>
              <div class="loading"><i class="fa fa-spinner fa-pulse"></i></div>  
              <div class="modal-body">
                
              
        
        
                </div>
              <div class="modal-footer"></div>
            </div><!-- /.modal-airline-content -->
            
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->   
        
        <!--<article class="airline-page"><h1>国际航空</h1><h2>厦门<i class="icon-arrow-right"></i> 大连<span>到达</span></h2><ul class="airline"><li class="airline-milestone is-take-off airline-start "><div class="airline-action"><h2 class="airline-title">CA8795</h2><span class="date">2016-06-30 11:30</span><div class="airline-content"><p>厦门 高崎国际 Ｔ4<i class="icon-arrow-right"></i>大连 周水子国际</p><p>多云</p></div></div></li><li class="airline-milestone is-flying"><div class="airline-action is-expandable"><h2 class="airline-title">Initial planning</h2><span class="date">Second quarter 2013</span><div class="airline-content"><ul ><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li><li class="airline-milestone is-delay"><div class="airline-action is-expandable"><h2 class="airline-title">Start construction</h2><span class="date">Fourth quarter 2013</span><div class="airline-content"><ul class="file-list"><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li><li class="airline-milestone is-cancel"><div class="airline-action is-expandable"><h2 class="airline-title">Start construction</h2><span class="date">Fourth quarter 2013</span><div class="airline-content"><ul class="file-list"><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li><li class="airline-milestone is-arrived "><div class="airline-action is-expandable"><h2 class="airline-title">Test and verify</h2><span class="date">Second quarter 2014</span><div class="airline-content"><ul class="file-list"><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li></ul></article>-->
        
        
         <script src="./js/vendor/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery-ui.min.js"></script>
        
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
<!--        <script src="./js/distpicker.data.js"></script>-->
<!--        <script src="./js/distpicker.js"></script>-->
        <script src="./js/bootstrap-datepicker.js"></script>
<!--        <script src="./js/bootstrap-table-filter.js"></script>-->

        <script>
$(document).ready(function() {
    setTimeout(1000);
    console.log("delay");
    var testHtml = '<article class="airline-page"><h1>国际航空</h1><h2>厦门<i class="icon-arrow-right"></i> 大连<span>到达</span></h2><ul class="airline"><li class="airline-milestone is-take-off airline-start "><div class="airline-action"><h2 class="airline-title">CA8795</h2><span class="date">2016-06-30 11:30</span><div class="airline-content"><p>厦门 高崎国际 Ｔ4<i class="icon-arrow-right"></i>大连 周水子国际</p><p>多云</p></div></div></li><li class="airline-milestone is-flying"><div class="airline-action is-expandable"><h2 class="airline-title">Initial planning</h2><span class="date">Second quarter 2013</span><div class="airline-content"><ul ><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li><li class="airline-milestone is-delay"><div class="airline-action is-expandable"><h2 class="airline-title">Start construction</h2><span class="date">Fourth quarter 2013</span><div class="airline-content"><ul class="file-list"><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li><li class="airline-milestone is-cancel"><div class="airline-action is-expandable"><h2 class="airline-title">Start construction</h2><span class="date">Fourth quarter 2013</span><div class="airline-content"><ul class="file-list"><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li><li class="airline-milestone is-arrived "><div class="airline-action is-expandable"><h2 class="airline-title">Test and verify</h2><span class="date">Second quarter 2014</span><div class="airline-content"><ul class="file-list"><li><a href="example/video" class="video-link">Introduction video</a></li><li><a href="example.pdf">Project Plan, pdf 2,8 MB</a></li><li><a href="example.pdf">Requirements, pdf 5,3 MB</a></li><li><a href="example.pdf">Test Plan, pdf 7,6 MB</a></li></ul></div></div></li></ul></article>';
    $.when(
    $('.modal-body').html(testHtml)
        
    ).then(function(data){
        //success;
        $airlineExpandableTitle = $('.airline-action.is-expandable .airline-title');

        $($airlineExpandableTitle).attr('tabindex', '0');

    // Give airlines ID's
        $('.airline').each(function(i, $airline) {
            var $airlineActions = $($airline).find('.airline-action.is-expandable');

            $($airlineActions).each(function(j, $airlineAction) {
                var $milestoneContent = $($airlineAction).find('.airline-content');

    //            $($milestoneContent).attr('id', 'airline-' + i + '-milestone-content-' + j).attr('role', 'region');
                $($milestoneContent).attr('id', 'airline-' + i + '-milestone-content-' + j).attr('role', 'region');
    //            $($milestoneContent).attr('aria-expanded', $($airlineAction).hasClass('expanded'));
                $($milestoneContent).attr('aria-expanded', $($airlineAction).hasClass('expanded'));


                $($airlineAction).find('.airline-title').attr('aria-controls', 'airline-' + i + '-milestone-content-' + j);
            });
        });

        $('.modal-body').on("click",$airlineExpandableTitle,function() {
            console.log("test",$(this));
            $($airlineExpandableTitle).parent().toggleClass('is-expanded');
            $($airlineExpandableTitle).siblings('.airline-content').attr('aria-expanded', $(this).parent().hasClass('is-expanded'));
        });
        // Expand or navigate back and forth between sections
        $($airlineExpandableTitle).keyup(function(e) {
            if (e.which == 13){ //Enter key pressed
                $(this).click();
            } else if (e.which == 37 ||e.which == 38) { // Left or Up
                $(this).closest('.airline-milestone').prev('.airline-milestone').find('.airline-action .airline-title').focus();
            } else if (e.which == 39 ||e.which == 40) { // Right or Down
                $(this).closest('.airline-milestone').next('.airline-milestone').find('.airline-action .airline-title').focus();
            }
        });
    },
    function(){
       //failed 
    });
    
    
    
    
});    
            
           
        </script>
    </body>
</html>