<?php

namespace App\Http\Controllers;

use App\Models\Reports;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->role;
        $reports = DB::table('reports')->get();
        //dd($user);
        return view('reports.index', compact('reports', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $inspector = DB::table('users')->where('id', $user)->pluck('name');
        $date = Carbon::now();

        //dd($date->format("Y-M-D H:m")); //this will dump the date time in the desired format
        //dd($inspector);
        return view('reports.create', compact('inspector', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'site_name' => 'required',
            'work_area' => 'required',
            'supervisor' => 'required',
            'completed_by' => 'required',
            'job_description' => 'required',
            'inspector' => 'required',
            'date_inspected' => 'required',
            'type' => 'required',
            'wah_intervention' => 'required',
            'wah_comment',
            'wah_completed' => 'required',
            'wah_action' => 'required',
            'lo_intervention' => 'required',
            'lo_comment',
            'lo_completed' => 'required',
            'lo_action' => 'required',
            'cet_intervention' => 'required',
            'cet_comment',
            'cet_completed' => 'required',
            'cet_action' => 'required',
            'con_intervention' => 'required',
            'con_comment',
            'con_completed' => 'required',
            'con_action' => 'required',
            'el_intervention' => 'required',
            'el_comment',
            'el_completed' => 'required',
            'el_action' => 'required',
            'st_intervention' => 'required',
            'st_comment',
            'st_completed' => 'required',
            'st_action' => 'required',
            'pw_intervention' => 'required',
            'pw_comment',
            'pw_completed' => 'required',
            'pw_action' => 'required',
            'ct_intervention' => 'required',
            'ct_comment',
            'ct_completed' => 'required',
            'ct_action' => 'required',
            'sr_intervention' => 'required',
            'sr_comment',
            'sr_completed' => 'required',
            'sr_action' => 'required',
            'iso_intervention' => 'required',
            'iso_comment',
            'iso_completed' => 'required',
            'iso_action' => 'required',
            'fr_intervention' => 'required',
            'fr_comment',
            'fr_completed' => 'required',
            'fr_action' => 'required',
            'aw_intervention' => 'required',
            'aw_comment',
            'aw_completed' => 'required',
            'aw_action' => 'required',
            'wm_intervention' => 'required',
            'wm_comment',
            'wm_completed' => 'required',
            'wm_action' => 'required',
            'pc_intervention' => 'required',
            'pc_comment',
            'pc_completed' => 'required',
            'pc_action' => 'required',
            'ca_intervention' => 'required',
            'ca_comment',
            'ca_completed' => 'required',
            'ca_action' => 'required',
            'pp_intervention' => 'required',
            'pp_comment',
            'pp_completed' => 'required',
            'pp_action' => 'required',
            'mh_intervention' => 'required',
            'mh_comment',
            'mh_completed' => 'required',
            'mh_action' => 'required',
            'oc_intervention' => 'required',
            'oc_comment',
            'oc_completed' => 'required',
            'oc_action' => 'required',
            'pt_intervention' => 'required',
            'pt_comment',
            'pt_completed' => 'required',
            'pt_action' => 'required',
            'vd_intervention' => 'required',
            'vd_comment',
            'vd_completed' => 'required',
            'vd_action' => 'required',
            'tu_intervention' => 'required',
            'tu_comment',
            'tu_completed' => 'required',
            'tu_action' => 'required',
            'vc_intervention' => 'required',
            'vc_comment',
            'vc_completed' => 'required',
            'vc_action' => 'required',
            'vl_intervention' => 'required',
            'vs_comment',
            'vs_completed' => 'required',
            'vs_action' => 'required',
            'tt_work_station' => 'required',
            'tt_quality' => 'required',
            'tt_site_rules' => 'required',
            'tt_environment' => 'required',
            'tt_p_individuals' => 'required',
            'tt_tools' => 'required',
            'tt_miscellaneous' => 'required',
            'tt_overal' => 'required',



        ]);

        $input = $request->all();

        $user = Reports::create($input);


        return redirect()->route('inspector.index')
            ->with('success', 'Report created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function show(Reports $report)
    {

        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function edit(Reports $report)
    {
        return view("reports.edit", compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reports $report)
    {
        $data = request()->validate([
            'site_name' => 'required',
            'work_area' => 'required',
            'supervisor' => 'required',
            'completed_by' => 'required',
            'job_description' => 'required',
            'inspector' => 'required',
            'date_inspected' => 'required',
            'type' => 'required',
            'wah_intervention' => 'required',
            'wah_comment,
            wah_completed' => 'required',
            'wah_action' => 'required',
            'lo_intervention' => 'required',
            'lo_comment',
            'lo_completed' => 'required',
            'lo_action' => 'required',
            'cet_intervention' => 'required',
            'cet_comment',
            'cet_completed' => 'required',
            'cet_action' => 'required',
            'con_intervention' => 'required',
            'con_comment',
            'con_completed' => 'required',
            'con_action' => 'required',
            'el_intervention' => 'required',
            'el_comment',
            'el_completed' => 'required',
            'el_action' => 'required',
            'st_intervention' => 'required',
            'st_comment',
            'st_completed' => 'required',
            'st_action' => 'required',
            'pw_intervention' => 'required',
            'pw_comment',
            'pw_completed' => 'required',
            'pw_action' => 'required',
            'ct_intervention' => 'required',
            'ct_comment',
            'ct_completed' => 'required',
            'ct_action' => 'required',
            'sr_intervention' => 'required',
            'sr_comment',
            'sr_completed' => 'required',
            'sr_action' => 'required',
            'iso_intervention' => 'required',
            'iso_comment',
            'iso_completed' => 'required',
            'iso_action' => 'required',
            'fr_intervention' => 'required',
            'fr_comment',
            'fr_completed' => 'required',
            'fr_action' => 'required',
            'aw_intervention' => 'required',
            'aw_comment',
            'aw_completed' => 'required',
            'aw_action' => 'required',
            'wm_intervention' => 'required',
            'wm_comment',
            'wm_completed' => 'required',
            'wm_action' => 'required',
            'pc_intervention' => 'required',
            'pc_comment',
            'pc_completed' => 'required',
            'pc_action' => 'required',
            'ca_intervention' => 'required',
            'ca_comment',
            'ca_completed' => 'required',
            'ca_action' => 'required',
            'pp_intervention' => 'required',
            'pp_comment',
            'pp_completed' => 'required',
            'pp_action' => 'required',
            'mh_intervention' => 'required',
            'mh_comment',
            'mh_completed' => 'required',
            'mh_action' => 'required',
            'oc_intervention' => 'required',
            'oc_comment',
            'oc_completed' => 'required',
            'oc_action' => 'required',
            'pt_intervention' => 'required',
            'pt_comment',
            'pt_completed' => 'required',
            'pt_action' => 'required',
            'vd_intervention' => 'required',
            'vd_comment',
            'vd_completed' => 'required',
            'vd_action' => 'required',
            'tu_intervention' => 'required',
            'tu_comment',
            'tu_completed' => 'required',
            'tu_action' => 'required',
            'vc_intervention' => 'required',
            'vc_comment',
            'vc_completed' => 'required',
            'vc_action' => 'required',
            'vl_intervention' => 'required',
            'vs_comment',
            'vs_completed' => 'required',
            'vs_action' => 'required',
            'tt_work_station' => 'required',
            'tt_quality' => 'required',
            'tt_site_rules' => 'required',
            'tt_environment' => 'required',
            'tt_p_individuals' => 'required',
            'tt_tools' => 'required',
            'tt_miscellaneous' => 'required',
            'tt_overal' => 'required',



        ]);

        $report->update($data);

        return redirect()->route('reports.index')
            ->with('success', 'Report Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reports $reports)
    {
        //
    }
}
