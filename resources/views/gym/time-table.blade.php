<tr class="odd">
    <td> 
        {{$day_name}}
    </td>
    <td>
        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
            <!--begin::Col-->
            <div class="col">
                <!--begin::Input group-->
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <!--begin::Input-->
                    <input class="form-control form-control-solid T-time" placeholder="من" id="{{'f_in_time_'.$gender.'_'.$day}}" name="{{'f_in_time_'.$day}}"  value="@if ($f_if) {{ explode('|',$f_if)[0] }} @endif" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Input-->
                    <input class="form-control form-control-solid T-time" placeholder="الى" id="{{'f_out_time_'.$gender.'_'.$day}}" name="{{'f_out_time_'.$day}}" value="@if ($f_if) {{ explode('|',$f_if)[1] }} @endif"/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>
    </td>
    <td>
        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
            <!--begin::Col-->
            <div class="col">
                <!--begin::Input group-->
                <div class="fv-row mb-7 fv-plugins-icon-container">
                    <!--begin::Input-->
                    <input class="form-control form-control-solid T-time" placeholder="من" id="{{'l_in_time_'.$gender.'_'.$day}}" name="{{'l_in_time_'.$day}}"  value="@if ($l_if) {{ explode('|',$l_if)[0] }} @endif"/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Input-->
                    <input class="form-control form-control-solid T-time" placeholder="الى" id="{{'l_out_time_'.$gender.'_'.$day}}" name="{{'l_out_time_'.$day}}" value="@if ($l_if) {{ explode('|',$l_if)[1] }} @endif"/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Col-->
        </div>
    </td>
    <td>
        <div class="form-check form-check-custom form-check-solid ">
            <input class="form-check-input" type="checkbox" value="" id="{{'full_time_'.$gender.'_'.$day}}" name="{{'full_time_'.$day}}""/>
        </div>
    </td>
    <td>
        <div class="form-check form-check-custom form-check-solid ">
            <input class="form-check-input" type="checkbox" value="" id="{{'holiday_'.$gender.'_'.$day}}" name="{{'holiday_'.$day}}""/>
        </div>
    </td>
</tr>

