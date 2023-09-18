<div class="modal fade" id="modal_edit_equota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document" style="width: 70%">
                                          <div class="modal-content" >
                                            <div class="modal-header" style="background-color: rgba(181, 188, 204, 1)!important;">
                                              <h3 class="modal-title text-center" id="exampleModalLongTitle"><i class="far fa-edit"></i>Add Title</h3>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>

                                            <div class="modal-body">
                                              <form id="form_update" action="{{route('update_iquota')}}" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" >
                                                {{ method_field('PUT')}}

                                                <input type="hidden" value="{{$Customer->tin_path}}" name="tin_h">
                                                <input type="hidden" value="{{$Customer->id_path}}" name="id_h">
                                                <input type="hidden" value="{{$Customer->id_card}}" name="id_d">
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label>{{trans('label.companyname')}}</label>
                                                        <input type="text" name="company_name" id="company_name" class="form-control" value="{{$Customer->company_name}}">
                                                      </div>

                                                      <div class="form-group">
                                                        <label>{{trans('label.contactname')}}</label>
                                                        <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{$Customer->Cominfo->contact_person}}">
                                                      </div>

                                                      <div class="form-group">
                                                        <label>{{trans('label.RoleCompany')}}</label>
                                                        <input type="text" name="role_company" id="role_company" class="form-control" value="{{$Customer->Cominfo->position}}">
                                                      </div>

                                                    </div>

                                                    <div class="col-md-4">

                                                      <div class="form-group">
                                                        <label>{{trans('front.taxcode')}}</label>
                                                        <input type="text" name="taxcode" id="taxcode" class="form-control" value="{{$Customer->idcard}}">
                                                      </div>

                                                      <div class="form-group">
                                                        <label>វិញ្ញាប័ណ្ណប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម</label>
                                                        <input type="file" name="tin_path">
                                                      </div>

                                                       <div class="form-group">
                                                        <label>វិញ្ញាប័ណ្ណប័ត្រចុះបញ្ជីអាករលើតម្លៃបន្ថែម</label>
                                                        <input type="file" name="id_path">
                                                      </div>

                                                    </div>

                                                    <div class="col-md-4">

                                                      <div class="form-group">
                                                        <label>{{trans('label.nationality')}}</label>
                                                        <input type="text" name="nationality" id="nationality" class="form-control" value="{{$Customer->Cominfo->nationality}}">
                                                      </div>

                                                      <div class="form-group">
                                                        <label>{{trans('label.gender')}}</label>
                                                        <select class="form-control" name="gender" id="gender">
                                                          <option value="Male">Male</option>
                                                          <option value="Female">Female</option>
                                                          <option value="Another">Another</option>
                                                        </select>
                                                      </div>

                                                      <div class="form-group">
                                                        <label>{{trans('label.Idnumber')}}</label>
                                                        <input type="text" name="personid" id="personid" class="form-control" value="{{$Customer->Cominfo->personid}}">
                                                      </div>

                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="col-sm-12" style="border-bottom: 2px solid #ccc;"> <div class="content_bottom_font_sm">អាស័យដ្ឋានទំនាក់ទំនង</div></div>
                                                <div class="col-sm-12" > &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>

                                                <div class="row">
                                                  <div class="col-sm-12">
                                                    <div class="col-md-4 form-group">
                                                      <label>ផ្ទះលេខ</label><br/>
                                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->house}}" class="form-control" name="house" id="house"></span>
                                                      
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                      <label>ផ្លូវលេខ</label><br/>
                                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->street}}" class="form-control" name="street" id="street"></span>
                                                         
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                      <label>ភូមិ</label><br/>
                                                      <!-- <span class="smtext"><input type="text" value="{{$Customer->village ? $Customer->village:''}}" class="form-control" name="village" ></span> -->
                                                      <select name="village" id="village" class="form-control">
                                                        <option>---Choose Village--</option>
                                                         @foreach($Villages as $village)
                                                            <option value="{{$village->id}}" {{$village->id == $Customer->village ? "selected":""}}>{{$village->vill_name}}</option>
                                                        @endforeach
                                                      </select>
                                                      
                                                      </div>
                                                  </div>
                                                  <div class="col-sm-12">

                                                    <div class="col-md-4 form-group">
                                                    <label>ឃុំ/សង្កាត់</label><br/>
                                                      <select name="commune" id="commune" class="form-control">
                                                        <option>---Choose Commune--</option>
                                                        @foreach($Commune as $commues)
                                                            <option value="{{$commues->id}}" {{$commues->commune_name ? "selected":""}}>{{$commues->commune_name}}</option>
                                                        @endforeach
                                                      </select>
                                                      
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                      <label>ស្រុក/ខ័ណ្ឌ</label><br/>
                                                      <select name="district" id="district" class="form-control">
                                                        <option>---Choose District--</option>
                                                         @foreach($Districts as $dis)
                                                            <option value="{{$dis->id}}" {{$dis->dis_name ? "selected":""}}>{{$dis->dis_name}}</option>
                                                        @endforeach
                                                      </select>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <label>ខេត្ត/រាជធានី</label><br/>
                                                      <select name="city" id="city" class="form-control">
                                                        <option>---Choose Province---</option>
                                                        @foreach($Province as $province)
                                                            <option value="{{$province->id}}">{{$province->pro_name}}</option>
                                                        @endforeach
                                                      </select>
                                                      
                                                    </div>
                                                  </div>

                                                  <div class="col-sm-12">
                                                    <div class="col-md-4 form-group">
                                                    <label>លេខទូរស័ព្ធ</label><br/>
                                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->tel}}" class="form-control" name="tel" id="tel"></span>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <label>ទូរសារ</label><br/>
                                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->fax}}"  class="form-control" name="fax" id="fax"></span>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                    <label>សារអេឡិចត្រូនិច</label><br/>
                                                      <span class="smtext"><input type="text" value="{{$Customer->Cominfo->email}}" class="form-control" name="email" id="email"></span>
                                                    
                                                    </div>
                                                  </div>
                                                </div>

                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary" id="edit_modal">Add new</button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>