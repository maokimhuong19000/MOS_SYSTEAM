<div class="sidebar" data-color="white" data-background-color="white" data-image="{{asset('admin/img/bg_left.jpg')}}" style="">
      <div class="logo">

        <a href="#" class="simple-text logo-normal" >
              {{ trans('label.department') }}

        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  data-toggle" style="display:none">
            <a class="nav-link" href="" >
              <i class="material-icons">home</i>
              {{ trans('label.dashboard') }}
            </a>
          </li>

        @if(Auth::user()->hasAnyPermission(4) || Auth::user()->hasAnyPermission(1) || Auth::user()->hasAnyPermission(7) || Auth::user()->hasAnyPermission(17))
            <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#products_main" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('label.item1') }}
                <b class="caret"></b>
              </p>
            </a>

            <div class="collapse lft " id="products_main">

              <ul class="nav">
                
                @if(Auth::user()->hasAnyPermission(4))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('product.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('label.item2') }} </span>
                  </a>
                </li>
                @endif


                @if(Auth::user()->hasAnyPermission(1))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('productmaterial.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('label.item3') }} </span>
                  </a>
                </li>
                @endif 
                 @if(Auth::user()->hasAnyPermission(7))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('price.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('label.item4') }} </span>
                  </a>
                </li>
                 @endif 

                  @if(Auth::user()->hasAnyPermission(17))
                 <li class="nav-item " >
                  <a class="nav-link" href="{{route('annualquota.index')}}">
                    <span class="sidebar-mini">  <i class="material-icons">work_outline</i> </span>
                    <span class="sidebar-normal"> {{ trans('label.item5') }} </span>
                  </a>
                </li>
                @endif 

                <li class="nav-item "  style="display: none">
                  <a class="nav-link" href="{{route('annualquota.quotacompany')}}">
                    <span class="sidebar-mini">  <i class="material-icons">work_outline</i> </span>
                    <span class="sidebar-normal"> {{ trans('label.quotacompany') }} </span>
                  </a>
                </li>

              </ul>
                </div>
          </li>
          @endif
        
@if(Auth::user()->hasAnyPermission(10) || Auth::user()->hasAnyPermission(11))
           <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#company_main" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('label.item6') }}
                <b class="caret"></b>
              </p>
            </a>

            <div class="collapse lft" id="company_main">

              <ul class="nav">
                
                @if(Auth::user()->hasAnyPermission(10))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('register.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                    <span class="sidebar-normal"> {{ trans('label.item7') }} </span>
                  </a>
                </li>
                @endif

                @if(Auth::user()->hasAnyPermission(11))
                <li class="nav-item "​ style="">
                  <a class="nav-link" href="{{route('register.create')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('label.item8') }} </span>
                  </a>
                </li>
                @endif

              </ul>
                </div>
          </li>
          @endif

          @if(Auth::user()->hasAnyPermission(50) || Auth::user()->hasAnyPermission(52) )
          <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#country" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('back.country_isubstance'  ) }}
                <b class="caret"></b>
              </p>
            </a>

            <div class="collapse lft" id="country">

              <ul class="nav">
                
                @if(Auth::user()->hasAnyPermission(50))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('country.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                    <span class="sidebar-normal">{{ trans('list.country1') }} </span>
                  </a>
                </li>
                @endif

                @if(Auth::user()->hasAnyPermission(52))
                <li class="nav-item "​ style="">
                  <a class="nav-link" href="{{route('country.create')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal">{{ trans('create.country3') }} </span>
                  </a>
                </li>
                @endif

              </ul>
                </div>
          </li>
@endif
          @if(Auth::user()->hasAnyPermission(54) || Auth::user()->hasAnyPermission(53) )
          <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#entry" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{trans('back.placei_isubstance')}}
                <b class="caret"></b>
              </p>
            </a>

            <div class="collapse lft" id="entry">

              <ul class="nav">
                
                @if(Auth::user()->hasAnyPermission(53))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('entry.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                    <span class="sidebar-normal">{{trans('liste.list_entry')}}</span>
                  </a>
                </li>
                @endif

                @if(Auth::user()->hasAnyPermission(54))
                <li class="nav-item "​ style="">
                  <a class="nav-link" href="{{route('entry.create')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal">{{trans('createe.create_entry')}}</span>
                  </a>
                </li>
                @endif

              </ul>
                </div>
          </li>

          @endif
           <li class="nav-item  " style="display:none">
            <a class="nav-link" data-toggle="collapse" href="#import_law" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('label.law') }}
                <b class="caret"></b>
              </p>
            </a>

            <div class="collapse lft" id="import_law"  >

              <ul class="nav">
                
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('register.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                    <span class="sidebar-normal"> {{ trans('label.law') }} </span>
                  </a>
                </li>
               
              </ul>
                </div>
          </li>
         @if(Auth::user()->hasAnyPermission(20) || Auth::user()->hasAnyPermission(22) || Auth::user()->hasAnyPermission(28))
           <li class="nav-item  " >
            <a class="nav-link" data-toggle="collapse" href="#import_request" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('import.menu') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse lft" id="import_request">
              <ul class="nav">
                
               @if(Auth::user()->hasAnyPermission(20))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('annualquotarequest')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('import.item2') }} </span>
                  </a>
                </li>
                @endif
                 @if(Auth::user()->hasAnyPermission(22))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('materialrequest')}}">

                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('import.item3') }} </span>
                  </a>
                </li>
                 @endif
                
                 @if (Auth::user()->hasAnyPermission(28))
                 <li class="nav-item ">
                  <a class="nav-link" href="{{route('equipmentrequest')}}">

                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('import.item1') }} </span>
                  </a>
                </li>
                 @endif
              </ul>
                </div>
          </li>
          @endif

          @if(Auth::user()->hasAnyPermission(30) || Auth::user()->hasAnyPermission(32) || Auth::user()->hasAnyPermission(34))
          <li class="nav-item  " >
            <a class="nav-link" data-toggle="collapse" href="#license" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('license.menu') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse lft" id="license">
              <ul class="nav">
                
                @if(Auth::user()->hasAnyPermission(30))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('qlicense')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('license.item1') }} </span>
                  </a>
                </li>
                @endif
                @if(Auth::user()->hasAnyPermission(32))
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('materiallicense')}}">

                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('license.item2') }} </span>
                  </a>
                </li>
                  @endif
                  @if(Auth::user()->hasAnyPermission(34))
                 <li class="nav-item ">
                  <a class="nav-link" href="{{route('equipmentlicense')}}">

                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('license.item3') }} </span>
                  </a>
                </li>
                  @endif
              </ul>
                </div>
          </li>
          @endif
          @canany(['report.substance.substance','report.substance.company','report.substance.port','report.substance.xcountry','report.substance.mcountry','report.substance.purpose'])

           <li class="nav-item  "  >
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('report.menu') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse lft" id="report">
              <ul class="nav">
                @can('report.substance.substance')
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('report.isubstance')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                    <span class="sidebar-normal"> {{ trans('report.item1') }} </span>
                  </a>
                </li>
                @endcan

                @can('report.substance.company')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.isubstanceByCompany')}}" >
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item2') }} </span>
                  </a>
                </li>
                  @endcan

                  @can('report.substance.port')
                <li class="nav-item " style="">
                  <a class="nav-link" href="{{route('report.isubstanceByPort')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item3') }} </span>
                  </a>
                </li>
                  @endcan

                  @can('report.substance.xcountry')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.isubstanceByCountry')}}"> 
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item4') }} </span>
                  </a>
                </li>
                  @endcan

                  @can('report.substance.mcountry')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.isubstanceBymCountry')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item5') }} </span>
                  </a>
                </li>
                  @endcan

                  @can('report.substance.purpose')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.isubstanceByPurpose')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item6') }} </span>
                  </a>
                </li>
                  @endcan
              </ul>
                </div>
          </li>
          @endcanany

          @canany(['report.equipment.company','report.equipment.port','report.equipment.xcountry','report.equipment.mcountry','report.equipment.purpose'])

           <li class="nav-item  "  >
            <a class="nav-link" data-toggle="collapse" href="#report1" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('report.menu1') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse lft" id="report1">
              <ul class="nav">
                
               @can('report.equipment.company')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.iequipmentByCompany')}}" >
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item2') }} </span>
                  </a>
                </li>
                @endcan
                @can('report.equipment.port')
                <li class="nav-item " style="">
                  <a class="nav-link" href="{{route('report.iequipmentByPort')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item3') }} </span>
                  </a>
                </li>
                 @endcan

                @can('report.equipment.xcountry')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.iequipmentByCountry')}}"> 
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item4') }} </span>
                  </a>
                </li>
                @endcan

                 @can('report.equipment.mcountry')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.iequipmentBymCountry')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item5') }} </span>
                  </a>
                </li>
                 @endcan

                 @can('report.equipment.purpose')
                <li class="nav-item " style="" >
                  <a class="nav-link" href="{{route('report.iequipmentByPurpose')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('report.item6') }} </span>
                  </a>
                </li>
                 @endcan
              </ul>
                </div>
          </li>
          @endcanany

        @canany(['user.view','user.create'])
          <li class="nav-item  ">
            <a class="nav-link" data-toggle="collapse" href="#permission" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p> {{ trans('permission.menu') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse lft" id="permission">
              <ul class="nav">
                @can('user.view')
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('user.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                    <span class="sidebar-normal"> {{ trans('permission.item1') }} </span>
                  </a>
                </li>
                @endcan

                @can('user.create')
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('signup')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>  </span>
                    <span class="sidebar-normal"> {{ trans('permission.item2') }} </span>
                  </a>
                </li>
                  @endcan
              </ul>
                </div>
          </li>
          @endcanany
          @if(Auth::user()->hasAnyPermission(50))
          <li class="nav-item  " style="display: none">
            <a class="nav-link" data-toggle="collapse" href="#translate" aria-expanded="true">
              <i class="material-icons">apps</i>
              <p>{{trans('label.translatebar')}}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse lft" id="translate">
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('translate.index')}}">
                    <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                    <span class="sidebar-normal">{{trans('label.translate')}}</span>
                  </a>
                </li>
              </ul>
                </div>
          </li>
          @endif
          @if(Auth::user()->hasAnyPermission(53) || Auth::user()->hasAnyPermission(55) )
            <li class="nav-item  " style="display: none">
              <a class="nav-link" data-toggle="collapse" href="#art" aria-expanded="true">
                <i class="material-icons">apps</i>
                <p>{{trans('article.art')}}
                  <b class="caret"></b>
                </p>
              </a>
              <div class="collapse lft" id="art">
                <ul class="nav">
                  @if(Auth::user()->hasAnyPermission(53))
                    <li class="nav-item ">
                      <a class="nav-link" href="{{route('article.index')}}">
                        <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                        <span class="sidebar-normal">{{trans('list_article.list')}}</span>
                      </a>
                    </li>
                  @endif

                    @if(Auth::user()->hasAnyPermission(55))
                      <li class="nav-item ">
                        <a class="nav-link" href="{{route('article.create')}}">
                          <span class="sidebar-mini"> <i class="material-icons">work_outline</i>   </span>
                          <span class="sidebar-normal">{{trans('view_article.create')}}</span>
                        </a>
                      </li>
                    @endif
                </ul>
                  </div>
            </li>
          @endif

        </ul>
      </div>
    </div>
