<div class="row">
	<div class="col-sm-6">
	 <!-- BEGIN PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Resumen de Matricula</span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_statistics_loading">
                    <table class="table table-bordered table-hover">
					    <tbody>
					        @foreach ($Resumen as $item)
					            <tr >
					                <td> {{ $item->grado_matriculado }} </td>
					                <td> {{ $item->total }} </td>
					            </tr>
					        @endforeach
                                <tr>
                                    <td><strong> Total :</strong></td>
                                    <td>{{ $Resumen->sum('total') }}</td>
                                </tr>
					    </tbody>
					</table>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->


	</div><!--/span-->
</div><!--/row-->



