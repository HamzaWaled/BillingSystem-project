<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use DB;

use App\Models\Bill;
use App\Models\BillDetails;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class BillController extends Controller
{
    

    public function Create()
    {
    	
    	// paginate is multiple pages
    	return view('bill.create');
    }
    
    public function detail_bill($id)
    {
    	$Onebill = Bill::find($id);
    	$bill = Bill::all();
    	$detail = BillDetails::all();
        $invoices = Bill::orderBy('id','desc')->paginate(10);
    	
    	// paginate is multiple pages
    	return view('bill.detail')->with('detail',$detail)->with('bill',$bill)->with('Onebill',$Onebill)->with('invoices',$invoices);
    }
    public function show_bill()
    {
    	$invoices = Bill::orderBy('id','desc')->paginate(10);
    	// paginate is multiple pages
    	return view('bill.show',compact('invoices'));
    }
    public function Storing(Request $request){
    	
    	$bill_obj2 = new BillDetails();
		$bill_obj = new Bill();
    	$bill_obj->NomSocieté =$request->SocietéForm; 
	    $bill_obj->IceSocieté =$request->ICEForm;
	    $bill_obj->AdresseSocieté =$request->AdresseForm; 
	    $bill_obj->NumeroFacture =$request->NumeroForm;
        $bill_obj->DateFacture =$request->DateForm;
		$bill_obj->MontantHT20 =$request->TotalHT20; 
	    $bill_obj->MontantHT7 =$request->TotalHT7;
	    $bill_obj->TotalHT =$request->TotalHT;
        $bill_obj->MontantTVA20 =$request->TotalTVA20;
		$bill_obj->MontantTVA7 =$request->TotalTVA7;
        $bill_obj->TotalTVA =$request->TotalTVA;  
	    $bill_obj->TotalTTC =$request->TotalTTC;
	    // dd($request->all());
	    $bill_obj->save();

	    // save in another table( i did that because i have an array of information not just 1 info)
	    $NomArticl = $request->NomForm;
	    $Quantit=$request->QuantitéForm;
	    $TV=$request->TVAForm;
	    $PrixUnitairTTC=$request->PrixUnitForm; 
	    $TotaUnit=$request->TotalForm;

	    for ($i=0; $i <count($NomArticl) ; $i++) { 
	    	$datasave = [
	    		'id_invoice'      =>$bill_obj->id,
	    		'NomArticle'      =>$NomArticl[$i],
	    		'Quantité'        =>$Quantit[$i],
	    		'TVA' 		 	  =>$TV[$i],
	    		'PrixUnitaireTTC' =>$PrixUnitairTTC[$i],
	    		'TotalUnit'       =>$TotaUnit[$i],

	    	];
	    	DB::table('bill_details')->insert($datasave);
	    	//return dd($request);
	    }



	   
        session::flash('success','Succès');
        return redirect()->route('CreateBill');
    }
    public function PrintB($id)
{
    $Onebill = Bill::find($id);
        $bill = Bill::all();
        $detail = BillDetails::all();
        $invoices = Bill::orderBy('id','desc')->paginate(10);
        
        // paginate is multiple pages
        return view('bill.print')->with('detail',$detail)->with('bill',$bill)->with('Onebill',$Onebill)->with('invoices',$invoices);
}
   public function WordB($id)
{
    $Onebill = Bill::find($id);
        $bill = Bill::all();
        $detail = BillDetails::all();
        $invoices = Bill::orderBy('id','desc')->paginate(10);
        
        // paginate is multiple pages
        return view('bill.word')->with('detail',$detail)->with('bill',$bill)->with('Onebill',$Onebill)->with('invoices',$invoices);
}
 public function Convert_directly_word($id)
{
        $count=1;
        $i=0;
    $Onebill = Bill::find($id);
        $bill = Bill::all();
        $detail = BillDetails::all();
        $detail2 = BillDetails::where('id_invoice',$id)->get();
        $countt = BillDetails::where('id_invoice',$id)->count();
        $invoices = Bill::orderBy('id','desc')->paginate(10);
        $templateprocessor = new TemplateProcessor('word-template/invoice.docx');
        $templateprocessor->setValue('id',$Onebill->id);
        $templateprocessor->setValue('datee',date('d/m/Y', strtotime($Onebill->DateFacture)));
        $templateprocessor->setValue('Nom',$Onebill->NomSocieté);
        $templateprocessor->setValue('Adresse',$Onebill->AdresseSocieté);
        $templateprocessor->setValue('ICE',$Onebill->IceSocieté);
        $templateprocessor->setValue('FACTURE',$Onebill->NumeroFacture);

        $templateprocessor->setValue('counter',$count++);
        foreach ($detail2 as $detail22) {
        $templateprocessor->setValue('article',$detail22->NomArticle);
        $templateprocessor->setValue('qtté',$detail22->Quantité);
        $templateprocessor->setValue('TVAA',$detail22->TVA);
        $templateprocessor->setValue('PU',$detail22->PrixUnitaireTTC);
        $templateprocessor->setValue('total',$detail22->TotalUnit);  
        $i++;
         } 
         

        
        

         $fileName = $Onebill->NomSocieté;
        $templateprocessor->saveAs($fileName . '.docx');
        return response()->download($fileName . '.docx')->deleteFileAfterSend(true);
        
}
}
