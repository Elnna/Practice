$( document ).ready(function() {
   
    $( "header h1 span" ).click(function( e ) {
 
//        alert( "Thanks for visiting!" );
        var city = $("header h1").text().substr(0,$("header h1").text().length-4);

        //替换body中的header
        var headerNode = document.getElementsByTagName('header')[0];
        var oldHeader1Node = headerNode.childNodes[1];
        var newHeader1Node = document.createElement('div');
        newHeader1Node.className = 'input-city';
        
      /*  var newFormNode = document.createElement("form");
        newFormNode.setAttribute('action','../weather.php');
        newFormNode.setAttribute('method','post');
        
        */
        
        var newInputNode = document.createElement('input');
        newInputNode.className = 'get-city';
        
        newHeader1Node.appendChild(newInputNode);
//        newFormNode.appendChild(newInputNode);
        
        var newSubmitNode = document.createElement('button');
        var buttonTextNode = document.createTextNode('确定');
        newSubmitNode.appendChild(buttonTextNode);
        newSubmitNode.className = 'submit-btn';
        
        newSubmitNode.setAttribute('type','button');
        newSubmitNode.setAttribute('name','submit');
        newSubmitNode.setAttribute('value','确定');
        
        newHeader1Node.appendChild(newSubmitNode);
//        newFormNode.appendChild(newSubmitNode);
        
//        newHeader1Node.appendChild(newFormNode);
        
//        console.log(newHeader1Node);
        headerNode.replaceChild(newHeader1Node,oldHeader1Node);
        $('header .input-city  .get-city').attr('type','text');
        $('header .input-city  .get-city').attr('name','city');
        $('header .input-city  .get-city').attr('value',city);
       
//        console.log(header.length);
      /*  console.log(oldHeader1Node);
        console.log(newHeader1Node);
        console.log(headerNode);*/
        $("header").on("click","button.submit-btn",function() {
    //        alert( "Thanks for visiting!" );
            var getCity = $('header .input-city .get-city').val();
            
           /* $.post(window.location.pathname,{city:getCity},function(data){
                console.log("post",data);
                location.reload();
            });
            
            oldHeader1Node.replaceChild(newTextNode1,oldHeader1Node.childNodes[0]);
            headerNode.replaceChild(oldHeader1Node,newHeader1Node);*/
            
            
            console.log(getCity);
            var newTextNode1 = document.createTextNode(getCity);
            var apikey = {'apikey':'2cf291486b5dd04551e81c11e1346615'};
            var url = 'http://apis.baidu.com/apistore/weatherservice/recentweathers?cityname=' + getCity;
            $.ajax({
               url:url, 
               method: "GET",  
               headers: apikey, 
               dataType: "json",
               success: function(data){
                   console.log(data);
                   if(data.errNum==0){
                       oldHeader1Node.replaceChild(newTextNode1,oldHeader1Node.childNodes[0]);
                        console.log(newHeader1Node.parentNode);
                       newHeader1Node.parentNode.replaceChild(oldHeader1Node,newHeader1Node);
                       var retData = data.retData;
                       var today = retData.today.date.split("-");
                       var forecast = retData.forecast;
                       
                       
                      //当天实况
                       $("#slide-0 div")[0].innerText = today[0] + "年" + today[1] + "月" + today[2] + "日" + forecast[0].week;
                       $("#slide-0").attr("data-weather",getWeatherCode(retData.today.type));
                       /*$(".slideshow__nav")[0].childNodes[1].childNodes[0].setAttribute("class","wi wi-day-" + getWeatherCode(retData.today.type));
                       */
                       $(".slideshow__nav i")[0].className ="wi wi-day-" + getWeatherCode(retData.today.type);
                       console.log(getWeatherCode(retData.today.type));
                       console.log("实况天气",$(".slideshow__nav i")[0]);
                       //更改温度
                       var newTempNodeText0 = document.createTextNode(retData.today.curTemp);
                       var oldTempNode0 = $('#slide-0 .slide__element--temp')[0];
                       var oldTempNodeText0 = $('#slide-0 .slide__element--temp')[0].childNodes[0];
                       oldTempNode0.replaceChild(newTempNodeText0,oldTempNodeText0);
                       
                       for(var i=1; i <= forecast.length; i++){
                        //更改日期：
                           var fdate = forecast[i-1]['date'].split("-");
                           
                           $("#slide-"+i + " div").innerText = fdate + "年" + fdate + "月" + fdate + "日&nbsp;" + forecast[i-1]['week'];
                           //更改天气标识
//                           console.log(getWeatherCode(forecast[i-1].type));
                           $(".slideshow__nav i")[i].className = "wi wi-day-" + getWeatherCode(forecast[i-1].type);
                           /*$(".slideshow__nav")[0].childNodes[i+2].childNodes[0].className = "wi wi-day-" + getWeatherCode(forecast[i-1].type);
                           */
                           //更改nav 日期
//                           console.log(forecast[i-1].date);
                           /*$(".slideshow__nav")[0].childNodes[i+2].childNodes[1].innerText = forecast[i-1].date.substr(9,2) + '/' + forecast[i-2].date.substr(5,2);
                           */
                           //更改温度
                           var newTempNodeText = document.createTextNode(forecast[i-1].lowtemp.substr(0,2) + '° ~ ' + forecast[i-1].hightemp.substr(0,2)+'°');
                           var oldTempNode = $('#slide-'+ i +' .slide__element--temp')[0];
                           var oldTempNodeText = $('#slide-'+ i +' .slide__element--temp')[0].childNodes[0];
                           oldTempNode.replaceChild(newTempNodeText,oldTempNodeText);
                       }
                       
                       
                       
                       console.log(retData);
                       console.log(today);
                       console.log(forecast);
                       
                   } else{
                       if(window.confirm(data.errMsg)){
                           return false;
                       }
//                       newHeader1Node.parentNode.replaceChild(oldHeader1Node,newHeader1Node);

                   }
//                  var info=data.retData;   

                },
                error:function(data){
                
                    console.log('failed',data);
                    headerNode.replaceChild(oldHeader1Node,newHeader1Node);
                }
               });
       
        });
  
    });
    
    
  var getWeatherCode = function(data){
      var code = '';
      switch(data){
              case'晴': code = 'sunny';
              break;
              case'多云': code = 'cloudy';
              break;
              case'阴': code = 'cloudy';
              break;
              case'阵雨': code = 'showers';
              break;
              case'雷阵雨': code = 'storm-showers';
              break;
              case'雷阵雨并伴有冰雹': code = 'radioactive'/* 'hail'*/;
              break;
              case'雨夹雪': code = 'sleet';
              break;
              case'小雨': code = 'sprinkle';
              break;
              case'中雨': code = 'rain-mix';
              break;
              case'大雨': code = 'rain';
              break;
              case'暴雨': code = 'thunderstorm';
              break;
              case'大暴雨': code = 'thunderstorm';
              break;
              case'特大暴雨': code = 'thunderstorm';
              break;
              case'阵雪': code = 'radioactive'/*'snow'*/;
              break;
              case'小雪': code = 'radioactive'/*'snow'*/;
              break;
              case'中雪': code = 'radioactive'/*'snow'*/;
              break;
              case'大雪': code = 'radioactive'/*'snow'*/;
              break;
              case'暴雪': code = 'radioactive'/*'snowthunderstorm'*/;
              break;
              case'雾': code = 'radioactive'/*'fog'*/;
              break;
              case'冻雨': code = 'sleet';
              break;
              case'沙尘暴': code = 'radioactive';
              break;
              case'小雨-中雨': code = 'radioactive';
              break;
              case'暴雨-大暴雨': code = 'radioactive';
              break;
              case'大暴雨-特大暴雨': code = 'radioactive';
              break;
              case'小雪-中雪': code = 'radioactive';
              break;
              case'中雪-大雪': code = 'radioactive';
              break;
              case'大雪-暴雪': code = 'radioactive';
              break;
              case'浮沉': code = 'radioactive';
              break;
              case'扬沙': code = 'radioactive';
              break;
              case'强沙尘暴': code = 'radioactive';
              break;
          default:code = 'sunny';
              break;
      }
      return code;
  }
 
     
  /*  $.ajax({
       url:url, 
       method: "GET",  
       headers: headers, 
       dataType: "json",
       success: function(data){
          var info=data.retData;   
          $.each(info,function(key,value){
              $("div").append(key+":"+value+"<br/>"); 
           });
        }
 })*/
    
    /*
    $.ajax({
        url: WEB_ROOT + "admin/contactlists/contactlist.json",
        // url:"http://127.0.0.1/koziness/admin/contactlists/contactlist.json",
        dataType:'jsonp',
        data:'',
        jsonp:'callback',
        success:function(result) {
            console.log("state1", this.state);

            console.log('success',result);
            //can't exe  belowing:
            this.setState({
                success: true,
                nPages : Math.ceil(result.contactlists.length/this.state.nRows),
                contactlist : result.contactlists,
                originData: result.contactlists
                //contactlist: result
            });
            
            console.log("state2", result);
            console.log("contactlist", this.state.contactlist);
        }.bind(this),
        
        error:function(result){
            console.log("failed", result);
        },
        timeout:3000
    });
    */
});