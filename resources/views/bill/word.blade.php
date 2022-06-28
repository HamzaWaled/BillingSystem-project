
@extends('layout.MasterPrint')
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: white; ">
          <!-- Content Header (Page header) -->
          <section class="content-header" style="background-color: white;">
            
            
          </section>

          <!-- Main content -->
          <section class="content" style="background-color: white;">

            <div class="row justify-content-center" style="background-color: white;">
        <div class="col-12" style="background-color: white;">
            <br><br><br><br><br>
            <div class="DateChange" style="font-family: Bookman Old Style; font-size: 17px;">

                Mohammedia, le : {{date('d/m/Y', strtotime($Onebill->DateFacture))}}
            </div>
            <br><br><br>
            <div class="changeAdresse" style="font-family: Bookman Old Style; font-size: 17px;">
              <b> {{ $Onebill->NomSocieté}}</b> 
            </div>
            <br><br>
            <div class="changeAdresse" style="font-family: Bookman Old Style; font-size: 17px;">
              <b> 
                <?php
                    $countNumWords = str_word_count("$Onebill->AdresseSocieté");
                    


                ?>
               
                {{ $Onebill->AdresseSocieté}}
              </b> 
            </div>
             <br><br><br><br><br><br>
            <div class="DateChange" style="font-family: Bookman Old Style; font-size: 17px;">
              <b> ICE : {{ $Onebill->IceSocieté}}</b> 
            </div>
            <br><br><br><br><br><br>
            <div class="num" style="font-family: Bookman Old Style; font-size: 20px;">
              <b>FACTURE N° {{ $Onebill->NumeroFacture}}</b> 
            </div>
            <br><br>
             <?php $COUNT=1; 
                    $COUNT2=0; 
             ?>
       <div style="background-color: white;">
          <table id="tbl" style="background-color: white;">
              <tr>
                <th style="font-family: Bookman Old Style; font-size: 17px;">N°</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">DESIGNATIONS</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">Qté</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">TVA</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">P.U.TTC</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">TOTAL TTC</th>
              </tr>
              @foreach($detail as $details)
              @if($details->id_invoice == $Onebill->id)

                  <tr>
                    @if($COUNT<10)
                        <td id="t" width="3.5%" style="font-family: Bookman Old Style; font-size: 17px;">{{$COUNT2}}{{$COUNT++}}</td>
                    
                     @else
                        <td id="t" width="3.5%" style="font-family: Bookman Old Style; font-size: 17px;">{{$COUNT++}}</td>
                    @endif
                    <td style="font-family: Bookman Old Style; font-size: 17px;">  {{$details->NomArticle}}</td>
                    <td id="t" width="6%" style="font-family: Bookman Old Style; font-size: 17px;">{{$details->Quantité}}</td>
                    <td id="t" width="5%" style="font-family: Bookman Old Style; font-size: 17px;">{{$details->TVA}}%</td>
                    <td id="tt" width="7%" style="font-family: Bookman Old Style; font-size: 17px;">{{$details->PrixUnitaireTTC}}</td>
                    <td id="tt" width="10%" style="font-family: Bookman Old Style; font-size: 17px;">{{$details->TotalUnit}}</td>
                  
                  </tr>
                  @endif
                  
              @endforeach
              
            </table>
       </div>  
       <br>  
       <div>
          <table id="tbl" style="background-color: white;">
              <tr>
                <th style="font-family: Bookman Old Style; font-size: 17px;">Montant <br> H.T. 20%</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">Montant<br> H.T. 7%</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">TOTAL <br>H.T.</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">Montant<br> TVA 20%</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">Montant<br> TVA 7%</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">TOTAL<br> TVA</th>
                <th style="font-family: Bookman Old Style; font-size: 17px;">TOTAL <br>T.T.C.</th>
              </tr>
              

                  <tr>
                    <td id="t" style="font-family: Bookman Old Style; font-size: 17px;">
                      @if($Onebill->MontantHT20 == null)
                      <b>0.00</b>
                      @else
                      <b>{{$Onebill->MontantHT20}}</b>
                      @endif
                      

                    </td>
                    <td id="t" style="font-family: Bookman Old Style; font-size: 17px;">
                      @if($Onebill->MontantHT7 == null)
                      <b>0.00</b>
                      @else
                      <b>{{$Onebill->MontantHT7}}</b>
                      @endif

                    </td>
                    <td id="t" style="font-family: Bookman Old Style; font-size: 17px;"><b>{{$Onebill->TotalHT}}</b></td>
                    <td id="t" style="font-family: Bookman Old Style; font-size: 17px;"><b>{{$Onebill->MontantTVA20}}</b></td>
                    <td id="t" style="font-family: Bookman Old Style; font-size: 17px;"><b>{{$Onebill->MontantTVA7}}</b></td>
                    <td id="t" style="font-family: Bookman Old Style; font-size: 17px;"><b>{{$Onebill->TotalTVA}}</b></td>
                    <td id="t" style="font-family: Bookman Old Style; font-size: 17px;"><b>{{$Onebill->TotalTTC}}</b> </td>
                  
                  </tr>
                
              
            </table>
       </div>   
       <br>  
       <div style="font-family: Bookman Old Style; font-size: 17px;">
          <b>LA PRESENTE FACTURE EST ARRETEE A LA SOMME DE :</b> 
        </div>


<?php 


function int2str($a){
  if ($a<0) return 'moins '.int2str(-$a);
  if ($a<17){
    switch ($a){
      case 0: return 'ZERO';
      case 1: return 'UN';
      case 2: return 'DEUX';
      case 3: return 'TROIS';
      case 4: return 'QUATRE';
      case 5: return 'CINQ';
      case 6: return 'SIX';
      case 7: return 'SEPT';
      case 8: return 'HUIT';
      case 9: return 'NEUF';
      case 10: return 'DIX';
      case 11: return 'ONZE';
      case 12: return 'DOUZE';
      case 13: return 'TREIZE';
      case 14: return 'QUATORZE';
      case 15: return 'QUINZE';
      case 16: return 'SEIZE';
    }
  } else if ($a<20){
    return 'DIX-'.int2str($a-10);
  } else if ($a<100){
    if ($a%10==0){
      switch ($a){
        case 20: return 'VINGT';
        case 30: return 'TRENTE';
        case 40: return 'QUARANTE';
        case 50: return 'CINQUANTE';
        case 60: return 'SOIXANTE';
        case 70: return 'SOIXANTE-DIX';
        case 80: return 'QUATRE-VINGT';
        case 90: return 'QUATRE-VINGT-DIX';
      }
    } else if ($a<70){
      return int2str($a-$a%10).' '.int2str($a%10);
    } else if ($a<80){
      return int2str(60).' '.int2str($a%20);
    } else{
      return int2str(80).' '.int2str($a%20);
    }
  } else if ($a==100){
    return 'CENT';
  } else if ($a<200){
    return int2str(100).' '.int2str($a%100);
  } else if ($a<1000){
    return int2str((int)($a/100)).' '.int2str(100).' '.int2str($a%100);
  } else if ($a==1000){
    return 'MILLE';
  } else if ($a<2000){
    return int2str(1000).' '.int2str($a%1000).' ';
  } else if ($a<1000000){
    return int2str((int)($a/1000)).' '.int2str(1000).' '.int2str($a%1000);
  }  
  //on pourrait pousser pour aller plus loin, mais c'est sans interret pour ce projet, et pas interessant, c'est pas non plus compliqué...
}



$convertintnumber = intval($Onebill->TotalTTC);

$convertedNumber = int2str("$convertintnumber"); // et voilà ce que ca donne


$decimal1 = $Onebill->TotalTTC - $convertintnumber; // 0.44000000000005 uh oh! that's why it needs... (see next line)
$decimal2 = round($decimal1, 2); // 0.44 this will round off the excess numbers
$decimal = substr($decimal2, 2);

?>




@if($decimal == 0)
<div style="font-family: Bookman Old Style; font-size: 17px;">
  <b>{{$convertedNumber}} DIRHAMS, 0{{$decimal}} CENTIME TTC.</b>
</div>
   
@endif
@if($decimal > 10)
<div style="font-family: Bookman Old Style; font-size: 17px;">
  <b>{{$convertedNumber}} DIRHAMS, {{$decimal}} CENTIMES TTC.</b>
</div>
   
@endif
@if($decimal < 10)
<div style="font-family: Bookman Old Style; font-size: 17px;">
  <b>{{$convertedNumber}} DIRHAMS, {{$decimal}}0 CENTIMES TTC.</b> 
</div>
  
@endif

<br> 

        </div>
    </div>

          </section>
          <!-- /.content -->
        </div>
        <style>
            .btn{
                float: right;
            }
            #t{
                text-align: center;
            }
            #tt{
                text-align: right;
            }
            #tbl th {
              text-align: center;
              background-color: #bfbfbf;
              
            }

            .DateChange{
                float: right;
                padding-right: 100px;
               
            }
            .changeAdresse{
                float: right;
                padding-right: 100px;
                
            }
            .num{
                font-size: 17px;
                text-align: center;
                text-decoration: underline;
                padding-right: 100px;
                
            }
            table, td, th {
                  border: 1px solid black;
            }

            table {
              width: 100%;
              border-collapse: collapse;
            }
        </style>
@endsection
@section('script')
<script>
  
  window.print();
</script>
@endsectionLO