@extends('layout.master')
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="btn">
                <a href="{{ route('ShowBill') }}" class="btn btn-primary ml-auto"><i class="fa fa-angle-left"></i>  Retour</a>
            </div>
            
          </section>

          <!-- Main content -->
          <section class="content">

            <div class="row justify-content-center">
        <div class="col-12">
            <br><br><br><br><br><br>
            <div class="DateChange" style="font-family: Bookman old style;">

                Mohammedia, le : {{date('d/m/Y', strtotime($Onebill->DateFacture))}}
            </div>
            <br><br>
            <div class="changeAdresse" style="font-family: Bookman old style;">
              <b> {{ $Onebill->NomSocieté}}</b> 
            </div>
            <br><br>
            <div class="changeAdresse" style="font-family: Bookman old style;">
              <b> {{ $Onebill->AdresseSocieté}}</b> 
            </div>
             <br><br><br><br>
            <div class="DateChange" style="font-family: Bookman old style;">
              <b> ICE : {{ $Onebill->IceSocieté}}</b> 
            </div>
            <br><br><br><br>
            <div class="num" style="font-family: Bookman old style;">
              <b>FACTURE N° {{ $Onebill->NumeroFacture}}</b> 
            </div>
            <br><br>
             <?php $COUNT=1; 
                    $COUNT2=0; 
             ?>
       <div>
          <table id="tbl">
              <tr>
                <th style="font-family: Bookman old style;">N°</th>
                <th style="font-family: Bookman old style;">DESIGNATIONS</th>
                <th style="font-family: Bookman old style;">Qté</th>
                <th style="font-family: Bookman old style;">TVA</th>
                <th style="font-family: Bookman old style;">P.U.TTC</th>
                <th style="font-family: Bookman old style;">TOTAL TTC</th>
              </tr>
              @foreach($detail as $details)
              @if($details->id_invoice == $Onebill->id)

                  <tr>
                    @if($COUNT<10)
                        <td id="t" width="3.5%" style="font-family: Bookman old style;">{{$COUNT2}}{{$COUNT++}}</td>
                    
                     @else
                        <td id="t" width="3.5%" style="font-family: Bookman old style;">{{$COUNT++}}</td>
                    @endif
                    <td>  {{$details->NomArticle}}</td>
                    <td id="t" width="6%" style="font-family: Bookman old style;">{{$details->Quantité}}</td>
                    <td id="t" width="5%" style="font-family: Bookman old style;">{{$details->TVA}}%</td>
                    <td id="tt" width="7%" style="font-family: Bookman old style;">{{$details->PrixUnitaireTTC}}</td>
                    <td id="tt" width="10%" style="font-family: Bookman old style;">{{$details->TotalUnit}}</td>
                  
                  </tr>
                  @endif
                  
              @endforeach
              
            </table>
       </div>  
       <br>  
       <div>
          <table id="tbl">
              <tr>
                <th style="font-family: Bookman old style;">Montant <br> H.T. 20%</th>
                <th style="font-family: Bookman old style;">Montant<br> H.T. 7%</th>
                <th style="font-family: Bookman old style;">TOTAL <br>H.T.</th>
                <th style="font-family: Bookman old style;">Montant<br> TVA 20%</th>
                <th style="font-family: Bookman old style;">Montant<br> TVA 7%</th>
                <th style="font-family: Bookman old style;">TOTAL<br> TVA</th>
                <th style="font-family: Bookman old style;">TOTAL <br>T.T.C.</th>
              </tr>
              

                  <tr>
                    <td id="t" style="font-family: Bookman old style;">
                      @if($Onebill->MontantHT20 == null)
                      <b>0.00</b>
                      @else
                      <b>{{$Onebill->MontantHT20}}</b>
                      @endif
                      

                    </td>
                    <td id="t" style="font-family: Bookman old style;">
                      @if($Onebill->MontantHT7 == null)
                      <b>0.00</b>
                      @else
                      <b>{{$Onebill->MontantHT7}}</b>
                      @endif

                    </td>
                    <td id="t" style="font-family: Bookman old style;"><b>{{$Onebill->TotalHT}}</b></td>
                    <td id="t" style="font-family: Bookman old style;"><b>{{$Onebill->MontantTVA20}}</b></td>
                    <td id="t" style="font-family: Bookman old style;"><b>{{$Onebill->MontantTVA7}}</b></td>
                    <td id="t" style="font-family: Bookman old style;"><b>{{$Onebill->TotalTVA}}</b></td>
                    <td id="t" style="font-family: Bookman old style;"><b>{{$Onebill->TotalTTC}}</b> </td>
                  
                  </tr>
                
              
            </table>
       </div>   
       <br>  
       <div style="font-family: Bookman old style;"> 
        <b>LA PRESENTE FACTURE EST ARRETEE A LA SOMME DE:</b> 
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
<div style="font-family: Bookman old style;">
  <b>{{$convertedNumber}} DIRHAMS, 0{{$decimal}} CENTIME TTC.</b>
</div>
   
@endif
@if($decimal > 10)
<div style="font-family: Bookman old style;">
  <b>{{$convertedNumber}} DIRHAMS, {{$decimal}} CENTIME TTC.</b>
</div>
   
@endif
@if($decimal < 10)
<div style="font-family: Bookman old style;">
  <b>{{$convertedNumber}} DIRHAMS, {{$decimal}}0 CENTIME TTC.</b> 
</div>
  
@endif

<br> 
@foreach($invoices as $invoice)
@if($invoice->id == $Onebill->id)

<div class='grouped'>
  <a type="button" class="btn btn-success btn-sm" href="{{ route('Print_bill',['id'=>$invoice->id]) }}"><i class="fas fa-print"></i> Imprimer </a>

</div>
<div class='is-grouped'>
     <a href="{{ route('Word_bill',['id'=>$invoice->id]) }}" type="button" class="btn btn-info btn-sm"><i class="fas fa-upload"></i> Exporter </a>
</div>
     
      @endif
@endforeach

        </div>
    </div>

          </section>
          <!-- /.content -->
        </div>
        <style>
          .grouped {   
             
             
              margin-left: 10px;
          }

          .is-grouped {   
             
             
              margin-right: 100px;
          }

          
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

@endsection