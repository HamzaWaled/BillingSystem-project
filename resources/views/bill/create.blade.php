@extends('layout.master')
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            
          </section>

          <!-- Main content -->
          <section class="content">

            <!-- Default box -->
            <div class="card card-default">
                <div class="card-header">
                  <h4 class="card-title" style="font-family: Algerian; color: #00004d ; font-size: 30px;" > Création de la facture</h4>

                  
                   <div class="ADD_btn">
                              <button  type="button" class="btn btn-primary btn-sm"><a style="color: white;" href="{{ route('ShowBill') }}" class="nav-link"> <i class="fa fa-angle-left"></i>  Liste des Factures</a></button>
                          </div>
                   
                </div>
                <!-- /.card-header -->
               <div >
               


                <form action="save-bill" method="POST" id="FrmSub" style="padding: 5px">
                  @csrf
                  <input type="hidden" name="btn_sub" id="btn_sub" value="no">
                  
                   
                    <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="SocietéForm">Nom de la societé</label>
                                <input type="textarea" class="form-control" id="title" placeholder="Écrivez le nom de la societé.." name="SocietéForm" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="AdresseForm">Adresse de la societé</label>
                                <input type="textarea" class="form-control" id="title" placeholder="Adresse.." name="AdresseForm" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ICEForm">ICE de la societé</label>
                                <input type="textarea" class="form-control" id="title" placeholder="ICE.." name="ICEForm" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="NumeroForm">Numero de la facture</label>
                                <input type="number" class="form-control" id="title" placeholder="Num FA.." name="NumeroForm" required>
                                
                            </div>
                           <div class="form-group col-md-12">
                                <label for="DateForm">Date de la facture</label>
                                <input type="date" class="form-control" id="title" placeholder="DATE .." name="DateForm" required>
                                <br>
                            </div>
                            
                           
                            
                           <br>
                            
                           <div class="table-responsive">
                             <table class="table" id="invoice_details">
                                  <thead>
                                    <tr>
                                       <th></th>
                                       <th>N°</th> 
                                       <th>Nom de l'article</th> 
                                       <th>Quantité</th> 
                                       <th>TVA</th> 
                                       <th>Prix unitaire TTC</th>
                                       <th>Total TTC</th>

                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr class="cloning_row" id="0">
                                      <td> </td>
                                      <td>01</td>
                                      <td>
                                        <input type="textarea" class="NomForm form-control" id="NomForm" placeholder="Écrivez le nom de l'article.." name="NomForm[]" required>
                                      </td>
                                      <td>
                                        <input type="textarea" class="QuantitéForm form-control" id="QuantitéForm" placeholder="Qté .." name="QuantitéForm[]" required>
                                      </td>
                                      <td>
                                        <select name="TVAForm[]" id="TVAForm" class="TVAForm form-control" data-placeholder="Select TVA" style="width: 100%;" required>
                                              <option selected disabled>TVA ..</option>
                                              <option value="20">20%</option>
                                              <option value="7">7%</option>
                                 
                                        </select>
                                        <!-- <input type="button" id = "btnGet" value="Get Selected Text Value" /> -->
                                      </td>
                                      <td>
                                        <input type="textarea" class="PrixUnitForm form-control" id="PrixUnitForm" placeholder="P.U.TTC .." name="PrixUnitForm[]" required>
                                      </td>
                                      
                                      <td>
                                        <input type="textarea" class="TotalForm form-control" id="TotalForm"  name="TotalForm[]" readonly="readonly">
                                      <input type="hidden" class="TotalForm20 form-control" id="TotalForm20"  name="TotalForm20[]" readonly="readonly">
                                     <input type="hidden" class="TotalForm7 form-control" id="TotalForm7"  name="TotalForm7[]" readonly="readonly">
                                      </td>
                                    </tr>
                                    
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                        <td colspan="6">
                                            <button type="button" class="btn_add btn btn-primary"><i class="fa fa-plus"> </i></button>
                                        </td>
                                    </tr> 
                                    <tr>
                                      <td colspan=4></td>
                                      <td colspan="2"> Montant H.T. 20%:</td>
                                      <td><input type="number" name="TotalHT20" id="TotalHT20" class=" TotalHT20 form-control " readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"></td>
                                      <td colspan="2"> Montant H.T. 7% :</td>
                                      <td><input type="number" name="TotalHT7" id="TotalHT7" class=" TotalHT7 form-control " readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"></td>
                                      <td colspan="2"> Total H.T. :</td>
                                      <td><input type="number" name="TotalHT" id="TotalHT" class=" TotalHT form-control " readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"></td>
                                      <td colspan="2"> Montant TVA 20% :</td>
                                      <td><input type="number" name="TotalTVA20" id="TotalTVA20" class=" TotalTVA20 form-control " readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"></td>
                                      <td colspan="2"> Montant TVA 7% :</td>
                                      <td><input type="number" name="TotalTVA7" id="TotalTVA7" class=" TotalTVA7 form-control " readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                      <td colspan="4"></td>
                                      <td colspan="2"> Total TVA :</td>
                                      <td><input type="number" name="TotalTVA" id="TotalTVA" class=" TotalTVA form-control " readonly="readonly"></td>

                                    </tr>
                                    <tr>
                                      <td colspan="4"></td>
                                      <td colspan="2"> <b> Total TTC :</b></td>
                                      <td><input type="number" name="TotalTTC" id="TotalTTC" class=" TotalTTC form-control " readonly="readonly"></td>
                                    </tr>
                                  </tfoot>
                             </table>

                           </div>



                    <button type="submit" name="save-bill" class="btn btn-primary">Enregistrer la facture</button>
                    
                  </div>
                  


                  
                  
                </form>



            </div>
                
              </div>
          
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.content -->
        </div>
         <style>
            .ADD_btn{
            float: right;
            
          } 
          .btnn{
            float: right;
          }
        </style>
        <!-- /.content-wrapper -->
@endsection
@section('script')

<script type="text/javascript">

  function TYPE_BTN()
  {
    $("#btn_sub").val("yes")
    var btn_type_val = $("#btn_sub").val();
    //alert();
    if(btn_type_val=="yes"){
      $("#FrmSub").submit();
    }
  }
</script>

<script type="text/javascript">

  $(document).ready(function(){
      $('#invoice_details').on('keyup blur','.QuantitéForm',function(){
        // check is there is we are actually touching the quantity
        let $row = $(this).closest('tr');
        // this means this table that we are working with (invoice_details), so row is every tr in this table
        let QuantitéForm = $row.find('.QuantitéForm').val()|| 0;
        //QuantitéForm is the value of the the quantity form that we are going to enter
        let PrixUnitForm = $row.find('.PrixUnitForm').val()|| 0;
        let TVAFormval = $row.find('.TVAForm').val()|| 0;
         $row.find('.TotalForm').val((QuantitéForm*PrixUnitForm).toFixed(2));
        if (TVAFormval == 20) {
        $row.find('.TotalForm20').val((QuantitéForm*PrixUnitForm).toFixed(2));
      }
       if (TVAFormval == 7) {
        $row.find('.TotalForm7').val((QuantitéForm*PrixUnitForm).toFixed(2));
      }

        $('#TotalTTC').val(TTC_calcul('.TotalForm'));
         
        if (TVAFormval == 20) {
          $('#TotalHT20').val(Montant_HT_20('.TotalForm20'));
        }
        $('#TotalTVA20').val(Montant_TVA_20('.TotalHT20'));
        if (TVAFormval == 7) {
          $('#TotalHT7').val(Montant_HT_7('.TotalForm7'));
        }
        $('#TotalTVA7').val(Montant_TVA_7('.TotalHT7'));
        
        $('#TotalTVA').val(TotalTvaFunction());
        $('#TotalHT').val(TotalHTFunction());

      
  });
  $('#invoice_details').on('keyup blur','.PrixUnitForm',function(){
        // check is there is we are actually touching the quantity
        let $row = $(this).closest('tr');
        // this means this table that we are working with (invoice_details), so row is every tr in this table
        let QuantitéForm = $row.find('.QuantitéForm').val()|| 0;
        //QuantitéForm is the value of the the quantity form that we are going to enter
        let PrixUnitForm = $row.find('.PrixUnitForm').val()|| 0;
        let TVAFormval = $row.find('.TVAForm').val()|| 0;
         $row.find('.TotalForm').val((QuantitéForm*PrixUnitForm).toFixed(2));
       if (TVAFormval == 20) {
        $row.find('.TotalForm20').val((QuantitéForm*PrixUnitForm).toFixed(2));
      }
       if (TVAFormval == 7) {
        $row.find('.TotalForm7').val((QuantitéForm*PrixUnitForm).toFixed(2));
      }

        $('#TotalTTC').val(TTC_calcul('.TotalForm'));
         
        if (TVAFormval == 20) {
          $('#TotalHT20').val(Montant_HT_20('.TotalForm20'));
        }
        $('#TotalTVA20').val(Montant_TVA_20('.TotalHT20'));
        if (TVAFormval == 7) {
          $('#TotalHT7').val(Montant_HT_7('.TotalForm7'));
        }
        $('#TotalTVA7').val(Montant_TVA_7('.TotalHT7'));
        
        $('#TotalTVA').val(TotalTvaFunction());
        $('#TotalHT').val(TotalHTFunction());
         
        
        //the value of TotalHT is a function called sum_total that will calculate the sum of every TotalForm in the table(now we need to define sum_total function)
      });
  $('#invoice_details').on('keyup blur','.TVAForm',function(){
        // check is there is we are actually touching the quantity
        let $row = $(this).closest('tr');
        // this means this table that we are working with (invoice_details), so row is every tr in this table
        let QuantitéForm = $row.find('.QuantitéForm').val()|| 0;
        //QuantitéForm is the value of the the quantity form that we are going to enter
        let PrixUnitForm = $row.find('.PrixUnitForm').val()|| 0;
        let TVAFormval = $row.find('.TVAForm').val()|| 0;
        $row.find('.TotalForm').val((QuantitéForm*PrixUnitForm).toFixed(2));
        if (TVAFormval == 20) {
        $row.find('.TotalForm20').val((QuantitéForm*PrixUnitForm).toFixed(2));
      }
       if (TVAFormval == 7) {
        $row.find('.TotalForm7').val((QuantitéForm*PrixUnitForm).toFixed(2));
      }

        $('#TotalTTC').val(TTC_calcul('.TotalForm'));
         
        if (TVAFormval == 20) {
          $('#TotalHT20').val(Montant_HT_20('.TotalForm20'));
        }
        $('#TotalTVA20').val(Montant_TVA_20('.TotalHT20'));
        if (TVAFormval == 7) {
          $('#TotalHT7').val(Montant_HT_7('.TotalForm7'));
        }
        $('#TotalTVA7').val(Montant_TVA_7('.TotalHT7'));
        
        $('#TotalTVA').val(TotalTvaFunction());
        $('#TotalHT').val(TotalHTFunction());
       
        
        //the value of TotalHT is a function called sum_total that will calculate the sum of every TotalForm in the table(now we need to define sum_total function)
      });
 
// it calculate the addiction of very TotalForm
      let TTC_calcul = function($selector){
        //selector will hold the value that we passed which is value of TotalForm
        let sum = 0;
        let count20=0;
        let count7=0;
        //THIS MEANS THAT the function will be done to every selector
        $($selector).each(function (){
          //each is a for loop
          //check is the value is no empty or it is not 0
          var selectedValue = $("#TVAForm").val();
            let selectorVal = $(this).val() != '' ? $(this).val() : 10; 
            //selectorVal is every value of the TotalForm of every artical  
            sum += parseFloat(selectorVal);
            if (selectedValue == 20) {
              count20+= parseFloat(selectorVal);

            }
            if (selectedValue == 7) {
              count7+= parseFloat(selectorVal);
            }
        });
        return sum.toFixed(2);
      }

      //declre another function to calculate ht of 20%
       let Montant_HT_20 = function($selector){
          let sum20 = 0;

          $($selector).each(function (){
                    //each is a for loop
                    //check is the value is no empty or it is not 0
                      let selectorVal = $(this).val() != '' ? $(this).val() : 0; 
                      
                          // alert(selectedValue)
                        sum20 += parseFloat(selectorVal);
                       
                      
                  });
                  sum20=sum20/1.2;
                  
                  return sum20.toFixed(2);
      }
       
       //declre another function to calculate ht of 7%
       let Montant_HT_7 = function($selector){
          let sum7 = 0;
          
          $($selector).each(function (){
                    //each is a for loop
                    //check is the value is no empty or it is not 0
                      let selectorVal = $(this).val() != '' ? $(this).val() : 0; 
                      
                      //check if what is the value of the selection, if 7 WE NEED TO ADD THEM TOGETHER? IF éà WE USE THE OTHER FUNCTION TO ADD THEM TOGETHER 
                     
                        // alert(selectedValue)
                        sum7 += parseFloat(selectorVal);
                      
                      
                  });
                  sum7=(sum7/1.07);
                  
                  return sum7.toFixed(2);
      }
      //declre another function to calculate montant tva 20%
       let Montant_TVA_20 = function($selector){
          let sum20 = 0;

          $($selector).each(function (){
                    //each is a for loop
                    //check is the value is no empty or it is not 0
                      let selectorVal = $(this).val() != '' ? $(this).val() : 0; 
                      //check if what is the value of the selection, if 7 WE NEED TO ADD THEM TOGETHER? IF éà WE USE THE OTHER FUNCTION TO ADD THEM TOGETHER 
                      
                         // alert(selectedValue)
                        sum20 = (selectorVal*20)/100;
                      
                      
                  });
          
                  return sum20.toFixed(2);
      }
      //declre another function to calculate montant tva 7%
       let Montant_TVA_7 = function($selector){
          let sum2 = 0;

          $($selector).each(function (){
                    //each is a for loop
                    //check is the value is no empty or it is not 0
                      let selectorVal = $(this).val() != '' ? $(this).val() : 0; 
                      //check if what is the value of the selection, if 7 WE NEED TO ADD THEM TOGETHER? IF éà WE USE THE OTHER FUNCTION TO ADD THEM TOGETHER 
                      
                     
                           // alert(selectedValue)
                        sum2 = (selectorVal*7)/100;
                     
                     
                  });
          
                  return sum2.toFixed(2);
      }
      
      //declre another function to calculate total TVA
       let TotalTvaFunction = function(){
          let res=0;
          let TotalTVA20 = parseFloat($('.TotalTVA20').val()) || 0;
          let TotalTVA7 = parseFloat($('.TotalTVA7').val()) || 0;
          

          res=TotalTVA20+TotalTVA7;

          return res.toFixed(2);
      }
      //declre another function to calculate total HT
       let TotalHTFunction = function(){
          let res=0;
          let TotalHT20 = parseFloat($('.TotalHT20').val()) || 0;
          let TotalHT7 = parseFloat($('.TotalHT7').val()) || 0;
          

          res=TotalHT20+TotalHT7;

          return res.toFixed(2);
      }       

        $(document).on('click','.btn_add',function(){
            let trCount = $('#invoice_details').find('tr.cloning_row:last').length;
              // invoice detail is the table, so we ask him to find the lenght of the very last tr named cloning_row, so that we will copy the exact same lenght
            let NumberInc = trCount > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id')) +1 : 0;
            //check if the last tr lenght is more than 0
            let count = 0;
            let count2= NumberInc+1;
            $('#invoice_details').find('tbody').append($('' +
                 ' <tr class="cloning_row" id="'+NumberInc+'">'+
                  '<td><button type ="button" class ="btn btn-danger btn-sm delgated-btn"><i class="fa fa-minus"></button></td>'+
                  '<td>'+ count+count2 +'</td>'+
                  '<td>'+
                  '<input type="textarea" class="NomForm form-control" id="NomForm" placeholder="Écrivez le nom de l article.." name="NomForm[]" required>'+
                  '</td>'+
                  '<td>'+
                  '<input type="textarea" class="QuantitéForm form-control" id="QuantitéForm" placeholder="Qté .." name="QuantitéForm[]" required>'+
                  '</td>'+
                  '<td>'+
                  '<select name="TVAForm[]" id="TVAForm" class="TVAForm form-control" data-placeholder="Select TVA" style="width: 100%;" required>'+
                  '<option selected disabled>TVA ..</option>'+
                  '<option value="20">20%</option>'+
                  '<option value="7">7%</option>'+
                  '</select>'+

                  '</td>'+
                  '<td>'+
                  '<input type="textarea" class="PrixUnitForm form-control" id="PrixUnitForm" placeholder="P.U.TTC .." name="PrixUnitForm[]" required>'+
                  '</td>'+
                  
                  '<td>'+
                  '<input type="textarea" class="TotalForm form-control" id="TotalForm"  name="TotalForm[]" readonly="readonly">'+
                '<input type="hidden" class="TotalForm20 form-control" id="TotalForm20"  name="TotalForm20[]" readonly="readonly">'+
                  '<input type="hidden" class="TotalForm7 form-control" id="TotalForm7"  name="TotalForm7[]" readonly="readonly">'+
                  '</td>'+
                  '</tr>'));


        });
        
        $(document).on('click','.delgated-btn',function (e){
          e.preventDefault();
          $(this).parent().parent().remove();
          $('#TotalTTC').val(TTC_calcul('.TotalForm'));
         
        if (TVAFormval == 20) {
          $('#TotalHT20').val(Montant_HT_20('.TotalForm20'));
        }
        $('#TotalTVA20').val(Montant_TVA_20('.TotalHT20'));
        if (TVAFormval == 7) {
          $('#TotalHT7').val(Montant_HT_7('.TotalForm7'));
        }
        $('#TotalTVA7').val(Montant_TVA_7('.TotalHT7'));
        
        $('#TotalTVA').val(TotalTvaFunction());
        $('#TotalHT').val(TotalHTFunction());
        });
  });
</script>
<script type="text/javascript">
    $(function () {
        $("#btnGet").click(function (e) {
            var selectedText = $("#TVAForm").find("option:selected").text();
            var selectedValue = $("#TVAForm").val();
            alert("Selected Text: " + selectedText + " Value: " + selectedValue);
        });
    });
</script>
   

@endsection