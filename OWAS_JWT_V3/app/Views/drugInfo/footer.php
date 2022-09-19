<footer class="page-footer font-small pt-2" style="bottom: 0 !important;">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2022 Copyright:
    <a> Drug Encyclopedia</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- <script src="toggled-search-bar.js"></script> -->
<script>
    $(document).ready(function(){
        $("#searchdatadiv").hide();
        $("#dataalphabeticallydiv").show();

        // $('.search-button').click(function(){
        //             alert('hiii');
        //         $('.search-box').toggle();
        // });

         var submitIcon = $('.searchbar-icon');
            var inputBox = $('.searchbar-input');
            var searchbar = $('.searchbar');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchbar.addClass('searchbar-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchbar.removeClass('searchbar-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
            searchbar.mouseup(function(){
                    return false;
                });
            $(document).mouseup(function(){
                    if(isOpen == true){
                        $('.searchbar-icon').css('display','block');
                        submitIcon.click();
                    }
                });
        // });
    
        $('#search_name').keyup(function(){
            // alert('hello');
            var query = $('#search_name').val();
            // alert('query==' + query);
            var base_url = $('#base_url').val();
            if(query !== ''){           
                $.ajax({
                   url: "<?= base_url('searchfunction'); ?>",
                    method:"POST",
                    data:{"query":query},
                    dataType: "json",
                    success:function(data)
                    { 
                        if(data){
                            $("#searchdatadiv").show();
                            $("#dataalphabeticallydiv").hide(); 

                            // data = (object)data;

                            // alert(data);
                            // console.log(data.drugSearchData);
                            // var myArr = $.makeArray(data);

                            // console.log(myArr);
                            $('#searchResult').empty();
                            $.each(data.drugSearchData, function (key, val) { 
                                // alert(val);
                                console.log(val);
                                // alert(key + val);
                                 // var id = $.base64('encode', val.id);
                                var id = val.id;
                                var linkvar = "<?php echo base_url()?>/drugdatabyname/" + btoa(val.id);

                                // alert('link=='+linkvar);

                                // var info = val.info;
                                // var strInfo = info.substr(0,100);
                                
                                // alert(linkvar);
                                $('#searchResult').append("<div class='col-md-3 col-lg-3' style='margin-top:10px;'>"+
                                    "<div class='card flex h-100 items-center w-100'>"+
                                    "<div class='card-header p-2'>"+
                                        "<h6>Drug</h6>"+
                                    "</div>"+
                                    "<a href='"+ linkvar +"'>"+
                                        "<div class='card-body'>" +
                                            "<div class='row'>"+
                                                "<div class='col-md-12 col-lg-12'>"+
                                                    "<p>"+ val.name +"</p>" +
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                        "</a>"+
                                    "</div>"+
                                "</div>");
                                // return false;
                            })
                            $.each(data.tagSearchData, function (key, val) { 
                                // alert(val);
                                // console.log(myArr);
                                // alert(key + val);
                                 var taglink = "<?php echo base_url()?>/getDrugByTag/" + btoa(val.name);
                                $('#searchResult').append("<div class='col-md-3 col-lg-3' style='margin-top:10px;'>"+
                                    "<div class='card flex h-100 items-center w-100'>"+
                                        "<div class='card-header p-2'>"+
                                            "<h6>Tag</h6>"+
                                        "</div>"+
                                        "<a href='"+ taglink +"'>"+
                                            "<div class='card-body'>" +
                                                "<div class='row'>"+
                                                    "<div class='col-md-12 col-lg-12'>"+
                                                        "<p>"+ val.name +"</p>" +
                                                    "</div>"+
                                                "</div>"+
                                            "</div>"+
                                        "</a>"+
                                    "</div>"+
                                "</div>");
                                // return false;
                                 // $('#searchResult').remove();
                            })
                            // $('#div_name').remove();
                        } else{
                            $("#searchdatadiv").hide();
                            $("#dataalphabeticallydiv").show(); 
                        }
                        // $('#searchData').html(data);   
                        // console.log(data); 
                        // data = $.parseJSON(data);
                        // return process(data);               
                    }

                   });

            } else {
                $("#searchdatadiv").hide();
                $("#dataalphabeticallydiv").show(); 
            } 
     });
    });
</script>