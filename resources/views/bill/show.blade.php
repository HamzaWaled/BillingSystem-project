@extends('layout.master')
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            
          </section>

          <!-- Main content -->
          <section class="content">

            <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex">
                   <h4 class="card-title" style="font-family: Algerian; color: #00004d ; font-size: 30px;" >Facture</h4>
                    <a href="{{ route('CreateBill') }}" class="btn btn-primary ml-auto"><i class="fa fa-plus"></i> Ajouter une facture</a>
                </div>


                    <div class="table-responsive">
                        <table id="example1" class="table card-table" >
                            <thead>
                            <tr>
                                <th>Nom de la societé</th>
                                <th>Numero de la facture</th>
                                <th>Date de la facture</th>
                                <th>Total TTC</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                            <tr>

                                <td><a href="{{ route('Detail_bill',['id'=>$invoice->id]) }}">{{ $invoice->NomSocieté}}</a> </td>
                                <td><a href="{{ route('Detail_bill',['id'=>$invoice->id]) }}">{{ $invoice->NumeroFacture}}</a> </td>
                                <td>{{date('d/m/Y', strtotime($invoice->DateFacture))}}</td>

                                <td>{{ $invoice->TotalTTC}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <div class="float-right">
                                        {!! $invoices->links() !!}
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>


            </div>
        </div>
    </div>

          </section>
          <!-- /.content -->
        </div>
        
@endsection
@section('script')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
       "buttons": ["pdf", "print", "colvis"]
      //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endsection