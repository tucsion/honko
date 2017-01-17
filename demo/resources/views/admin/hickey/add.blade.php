@extends('admin.layout')
@section('content')
<script type="text/javascript">
    document.title='康复园器械添加';
</script> 
<style type="text/css">  
     {{ date_default_timezone_set('PRC') }} 
</style>

<!-- 配置文件 -->
<script type="text/javascript" src="{{ url('/admin/ue/ueditor.config.js') }}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{ url('/admin/ue/ueditor.all.js') }}"></script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                器械管理
                <small>添加</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin/index')}}"><i class="fa fa-dashboard"></i>主页</a></li>
                <li><a href="#">康复园器械管理</a></li>
                <li class="active">添加页面</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
 
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">添加页面</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                       
                        @if(session('info'))
                        <div class="alert alert-danger">
                                <ul>
                                   
                                        <li>{{ session('info') }}</li>
                                    
                                </ul>
                            </div>
                            
                        @endif
                         @if(session('img'))
                        <div class="alert alert-danger">
                                <ul>
                                   
                                        <li>{{ session('img') }}</li>
                                    
                                </ul>
                            </div>
                            
                        @endif

                        <form class="form-horizontal" action="{{ url('/admin/hickey/insert') }}" method='post'  ENCTYPE= 'MULTIPART/FORM-DATA'>
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">器械名称</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='hname' value="{{ old('hname') }}" class="form-control" id="inputEmail3" placeholder="请输入器械名称">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="inputPassword3"  class="col-sm-2 control-label">器械分类</label>

                                    <div class="col-sm-10">
                                     <select name='cid' class='form-control'>  
                                       
                                     @foreach($data as $cate)
                                           <option value="{{ $cate ->id }}">{{ $cate->cate }}</option>

                                          
                                     @endforeach  

                                       </select>  

                                    </div>  

                                </div>
                                <div class="form-group">
                                <label for="inputPassword3"  class="col-sm-2 control-label">使用范围</label>
                                    <div class="col-sm-10">
                                     <select name='scope' class='form-control'>
                                           
                                     @foreach($res as $scope)

                                           <option value="{{ $scope ->id }}">{{ $scope -> name }}</option>
                                     @endforeach     
                                       </select>  
                                    </div>                           
                                </div>

                                <div class="form-group">
                                 <label for="inputPassword3"  class="col-sm-2 control-label">生产厂家</label>
                                    <div class="col-sm-10">
                                     <select name='vender' class='form-control'>
                                           <option value="0">暂无生产厂家</option>
                                     @foreach($vender as $vender)

                                           <option value="{{ $vender ->id }}">{{ $vender -> name }}</option>
                                     @endforeach     
                                       </select>   
                                    </div>   
                                </div>
                                <div class="form-group">
                                 <label for="inputPassword3"  class="col-sm-2 control-label">代理商</label>
                                    <div class="col-sm-10">
                                     <select name='agent' class='form-control'>
                                           <option value="0">暂无代理商</option>
                                     @foreach($agent as $agent)

                                           <option value="{{ $agent ->id }}">{{ $agent -> name }}</option>
                                     @endforeach     
                                       </select>   
                                    </div>   
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">产品编号</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='hnum' value="{{ old('hnum') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的产品编号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">品牌</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='brand' value="{{ old('brand') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的品牌">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">产地</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='field' value="{{ old('field') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的产地">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">产品型号</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='htype' value="{{ old('htype') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的产品型号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">毛重</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='net' value="{{ old('net') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的毛重">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">净重</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='kg' value="{{ old('kg') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的净重">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">展开尺寸</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='measure' value="{{ old('measure') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的展开尺寸">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">纸箱尺寸</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='size' value="{{ old('size') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的纸箱尺寸">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">计时范围</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='timing' value="{{ old('timing') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的计时范围">
                                    </div>
                                </div>
                        
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">速度范围</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='speeding' value="{{ old('speeding') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的速度范围">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">距离范围</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='gaping' value="{{ old('gaping') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的距离范围">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">热量范围</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='heating' value="{{ old('heating') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的热量范围">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">易耗品</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='expend' value="{{ old('expend') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入易耗品类型">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">收费编号</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='tollnum' value="{{ old('tollnum') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的收费编号">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">详细信息</label>
                                    <div class="col-sm-10">
                                    <!-- 加载编辑器的容器 -->
                                    <script id="container1" name="news" type="text/plain">
                                    </script>
                                    <!-- 实例化编辑器 -->
                                    <script type="text/javascript">
                                        var ue = UE.getEditor('container1');
                                    </script>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">产品参数</label>
                                    <div class="col-sm-10">
                                            <!-- 加载编辑器的容器 -->
                                            <script id="container2" name="parameter" type="text/plain">
                                            </script>
                                            <!-- 实例化编辑器 -->
                                            <script type="text/javascript">
                                                var ue = UE.getEditor('container2');
                                            </script>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">器械图片</label>
                                    <div class="col-sm-10">
                                    <input type="file" name='img' id="exampleInputFile">
                                    <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">配置清单</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='deploy' value="{{ old('deploy') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的配置清单">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">资质</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='aptitude' value="{{ old('aptitude') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的资质有无">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">彩页</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='page' value="{{ old('page') }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的彩页有无">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">发布日期</label>
                                    <div class="col-sm-10">
                                        <input type="text" name='addtime' value="{{ date('Y-m-d H:i:s', time()) }}" class="form-control" id="inputPassword3"
                                               placeholder="请输入器械的添加时间">
                                    </div>
                                </div>
   
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="reset" class="btn btn-default">重置</button>
                                <button type="submit" class="btn btn-info pull-right">提交</button>
                            </div><!-- /.box-footer -->
                        </form>
                    </div><!-- /.box -->
                 
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection