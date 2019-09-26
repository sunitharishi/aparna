<?php

namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;



/**

 * Class Vendor

 *

 * @package App

 * @property string $first_name

 * @property string $last_name

 * @property string $company_name

 * @property string $email

 * @property string $phone

 * @property string $website

 * @property string $skype

 * @property string $country

 * @property string $client_status

*/

class Manpowervalidation extends Model

{

    use SoftDeletes;  
	
    protected $fillable = ['site','type','mmr_agm_hr_shared','mmr_agm_hr_full','mmr_agm_hr_ch','mmr_agm_hr_gen','mmr_agm_hr_a','mmr_agm_hr_b','mmr_agm_hr_c','mmr_assistant_shared','mmr_assistant_full','mmr_assistant_ch','mmr_assistant_gen','mmr_assistant_a','mmr_assistant_b','mmr_assistant_c','mmr_asst_help_desk_shared','mmr_asst_help_desk_full','mmr_asst_help_desk_ch','mmr_asst_help_desk_gen','mmr_asst_help_desk_a','mmr_asst_help_desk_b','mmr_asst_help_desk_c','mmr_asst_sec_officer_shared','mmr_asst_sec_officer_full','mmr_asst_sec_officer_ch','mmr_asst_sec_officer_gen','mmr_asst_sec_officer_a','mmr_asst_sec_officer_b','mmr_asst_sec_officer_c','mmr_asst_stores_shared','mmr_asst_stores_full','mmr_asst_stores_ch','mmr_asst_stores_gen','mmr_asst_stores_a','mmr_asst_stores_b','mmr_asst_stores_c','mmr_asst_eng_facility_shared','mmr_asst_eng_facility_full','mmr_asst_eng_facility_ch','mmr_asst_eng_facility_gen','mmr_asst_eng_facility_a','mmr_asst_eng_facility_b','mmr_asst_eng_facility_c','mmr_asst_mngr_pms_shared','mmr_asst_mngr_pms_full','mmr_asst_mngr_pms_ch','mmr_asst_mngr_pms_gen','mmr_asst_mngr_pms_a','mmr_asst_mngr_pms_b','mmr_asst_mngr_pms_c','mmr_asst_mngr_security_shared','mmr_asst_mngr_security_full','mmr_asst_mngr_security_ch','mmr_asst_mngr_security_gen','mmr_asst_mngr_security_a','mmr_asst_mngr_security_b','mmr_asst_mngr_security_c','mmr_bms_operator_shared','mmr_bms_operator_full','mmr_bms_operator_ch','mmr_bms_operator_gen','mmr_bms_operator_a','mmr_bms_operator_b','mmr_bms_operator_c','mmr_care_taker_ch_shared','mmr_care_taker_ch_full','mmr_care_taker_ch_ch','mmr_care_taker_ch_gen','mmr_care_taker_ch_a','mmr_care_taker_ch_b','mmr_care_taker_ch_c','mmr_carpenter_shared','mmr_carpenter_full','mmr_carpenter_ch','mmr_carpenter_gen','mmr_carpenter_a','mmr_carpenter_b','mmr_carpenter_c','mmr_attendant_shared','mmr_attendant_full','mmr_attendant_ch','mmr_attendant_gen','mmr_attendant_a','mmr_attendant_b','mmr_attendant_c','mmr_dgm_facility_shared','mmr_dgm_facility_full','mmr_dgm_facility_ch','mmr_dgm_facility_gen','mmr_dgm_facility_a','mmr_dgm_facility_b','mmr_dgm_facility_c','mmr_dgm_bd_operations_shared','mmr_dgm_bd_operations_full','mmr_dgm_bd_operations_ch','mmr_dgm_bd_operations_gen','mmr_dgm_bd_operations_a','mmr_dgm_bd_operations_b','mmr_dgm_bd_operations_c','mmr_drivers_shared','mmr_drivers_full','mmr_drivers_ch','mmr_drivers_gen','mmr_drivers_a','mmr_drivers_b','mmr_drivers_c','mmr_dy_manger_pms_shared','mmr_dy_manger_pms_full','mmr_dy_manger_pms_ch','mmr_dy_manger_pms_gen','mmr_dy_manger_pms_a','mmr_dy_manger_pms_b','mmr_dy_manger_pms_c','mmr_dy_mang_facility_shared','mmr_dy_mang_facility_full','mmr_dy_mang_facility_ch','mmr_dy_mang_facility_gen','mmr_dy_mang_facility_a','mmr_dy_mang_facility_b','mmr_dy_mang_facility_c','mmr_electrician_shared','mmr_electrician_full','mmr_electrician_ch','mmr_electrician_gen','mmr_electrician_a','mmr_electrician_b','mmr_electrician_c','mmr_eng_facility_shared','mmr_eng_facility_full','mmr_eng_facility_ch','mmr_eng_facility_gen','mmr_eng_facility_a','mmr_eng_facility_b','mmr_eng_facility_c','mmr_executive_ch_shared','mmr_executive_ch_full','mmr_executive_ch_ch','mmr_executive_ch_gen','mmr_executive_ch_a','mmr_executive_ch_b','mmr_executive_ch_c','mmr_exec_hr_shared','mmr_exec_hr_full','mmr_exec_hr_ch','mmr_exec_hr_gen','mmr_exec_hr_a','mmr_exec_hr_b','mmr_exec_hr_c','mmr_exec_pms_shared','mmr_exec_pms_full','mmr_exec_pms_ch','mmr_exec_pms_gen','mmr_exec_pms_a','mmr_exec_pms_b','mmr_exec_pms_c','mmr_front_office_exec_shared','mmr_front_office_exec_full','mmr_front_office_exec_ch','mmr_front_office_exec_gen','mmr_front_office_exec_a','mmr_front_office_exec_b','mmr_front_office_exec_c','mmr_garden_help_shared','mmr_garden_help_full','mmr_garden_help_ch','mmr_garden_help_gen','mmr_garden_help_a','mmr_garden_help_b','mmr_garden_help_c','mmr_gardener_shared','mmr_gardener_full','mmr_gardener_ch','mmr_gardener_gen','mmr_gardener_a','mmr_gardener_b','mmr_gardener_c','mmr_gas_technician_shared','mmr_gas_technician_full','mmr_gas_technician_ch','mmr_gas_technician_gen','mmr_gas_technician_a','mmr_gas_technician_b','mmr_gas_technician_c','mmr_general_manager_hr_shared','mmr_general_manager_hr_full','mmr_general_manager_hr_ch','mmr_general_manager_hr_gen','mmr_general_manager_hr_a','mmr_general_manager_hr_b','mmr_general_manager_hr_c','mmr_get_shared','mmr_get_full','mmr_get_ch','mmr_get_gen','mmr_get_a','mmr_get_b','mmr_get_c','mmr_gymboy_shared','mmr_gymboy_full','mmr_gymboy_ch','mmr_gymboy_gen','mmr_gymboy_a','mmr_gymboy_b','mmr_gymboy_c','mmr_gym_trainer_shared','mmr_gym_trainer_full','mmr_gym_trainer_ch','mmr_gym_trainer_gen','mmr_gym_trainer_a','mmr_gym_trainer_b','mmr_gym_trainer_c','mmr_head_guard_security_shared','mmr_head_guard_security_full','mmr_head_guard_security_ch','mmr_head_guard_security_gen','mmr_head_guard_security_a','mmr_head_guard_security_b','mmr_head_guard_security_c','mmr_house_keeper_shared','mmr_house_keeper_full','mmr_house_keeper_ch','mmr_house_keeper_gen','mmr_house_keeper_a','mmr_house_keeper_b','mmr_house_keeper_c','mmr_hvac_technician_shared','mmr_hvac_technician_full','mmr_hvac_technician_ch','mmr_hvac_technician_gen','mmr_hvac_technician_a','mmr_hvac_technician_b','mmr_hvac_technician_c','mmr_jr_officer_horticulture_shared','mmr_jr_officer_horticulture_full','mmr_jr_officer_horticulture_ch','mmr_jr_officer_horticulture_gen','mmr_jr_officer_horticulture_a','mmr_jr_officer_horticulture_b','mmr_jr_officer_horticulture_c','mmr_jr_executive_shared','mmr_jr_executive_full','mmr_jr_executive_ch','mmr_jr_executive_gen','mmr_jr_executive_a','mmr_jr_executive_b','mmr_jr_executive_c','mmr_jr_executive_accounts_shared','mmr_jr_executive_accounts_full','mmr_jr_executive_accounts_ch','mmr_jr_executive_accounts_gen','mmr_jr_executive_accounts_a','mmr_jr_executive_accounts_b','mmr_jr_executive_accounts_c','mmr_jr_executive_ch_shared','mmr_jr_executive_ch_full','mmr_jr_executive_ch_ch','mmr_jr_executive_ch_gen','mmr_jr_executive_ch_a','mmr_jr_executive_ch_b','mmr_jr_executive_ch_c','mmr_jr_officer_fs_shared','mmr_jr_officer_fs_full','mmr_jr_officer_fs_ch','mmr_jr_officer_fs_gen','mmr_jr_officer_fs_a','mmr_jr_officer_fs_b','mmr_jr_officer_fs_c','mmr_jr_officer_facilities_shared','mmr_jr_officer_facilities_full','mmr_jr_officer_facilities_ch','mmr_jr_officer_facilities_gen','mmr_jr_officer_facilities_a','mmr_jr_officer_facilities_b','mmr_jr_officer_facilities_c','mmr_jr_supervisor_security_shared','mmr_jr_supervisor_security_full','mmr_jr_supervisor_security_ch','mmr_jr_supervisor_security_gen','mmr_jr_supervisor_security_a','mmr_jr_supervisor_security_b','mmr_jr_supervisor_security_c','mmr_jr_executive_admin_shared','mmr_jr_executive_admin_full','mmr_jr_executive_admin_ch','mmr_jr_executive_admin_gen','mmr_jr_executive_admin_a','mmr_jr_executive_admin_b','mmr_jr_executive_admin_c','mmr_jr_executive_pms_shared','mmr_jr_executive_pms_full','mmr_jr_executive_pms_ch','mmr_jr_executive_pms_gen','mmr_jr_executive_pms_a','mmr_jr_executive_pms_b','mmr_jr_executive_pms_c','mmr_jr_officer_pms_shared','mmr_jr_officer_pms_full','mmr_jr_officer_pms_ch','mmr_jr_officer_pms_gen','mmr_jr_officer_pms_a','mmr_jr_officer_pms_b','mmr_jr_officer_pms_c','mmr_lady_security_gaurd_shared','mmr_lady_security_gaurd_full','mmr_lady_security_gaurd_ch','mmr_lady_security_gaurd_gen','mmr_lady_security_gaurd_a','mmr_lady_security_gaurd_b','mmr_lady_security_gaurd_c','mmr_lift_care_taker_shared','mmr_lift_care_taker_full','mmr_lift_care_taker_ch','mmr_lift_care_taker_gen','mmr_lift_care_taker_a','mmr_lift_care_taker_b','mmr_lift_care_taker_c','mmr_manager_facilities_shared','mmr_manager_facilities_full','mmr_manager_facilities_ch','mmr_manager_facilities_gen','mmr_manager_facilities_a','mmr_manager_facilities_b','mmr_manager_facilities_c','mmr_manager_firesafety_shared','mmr_manager_firesafety_full','mmr_manager_firesafety_ch','mmr_manager_firesafety_gen','mmr_manager_firesafety_a','mmr_manager_firesafety_b','mmr_manager_firesafety_c','mmr_manager_horticulture_shared','mmr_manager_horticulture_full','mmr_manager_horticulture_ch','mmr_manager_horticulture_gen','mmr_manager_horticulture_a','mmr_manager_horticulture_b','mmr_manager_horticulture_c','mmr_manager_hr_shared','mmr_manager_hr_full','mmr_manager_hr_ch','mmr_manager_hr_gen','mmr_manager_hr_a','mmr_manager_hr_b','mmr_manager_hr_c','mmr_manager_operations_shared','mmr_manager_operations_full','mmr_manager_operations_ch','mmr_manager_operations_gen','mmr_manager_operations_a','mmr_manager_operations_b','mmr_manager_operations_c','mmr_manager_td_shared','mmr_manager_td_full','mmr_manager_td_ch','mmr_manager_td_gen','mmr_manager_td_a','mmr_manager_td_b','mmr_manager_td_c','mmr_mason_shared','mmr_mason_full','mmr_mason_ch','mmr_mason_gen','mmr_mason_a','mmr_mason_b','mmr_mason_c','mmr_mechanic_shared','mmr_mechanic_full','mmr_mechanic_ch','mmr_mechanic_gen','mmr_mechanic_a','mmr_mechanic_b','mmr_mechanic_c','mmr_multi_suill_technician_shared','mmr_multi_suill_technician_full','mmr_multi_suill_technician_ch','mmr_multi_suill_technician_gen','mmr_multi_suill_technician_a','mmr_multi_suill_technician_b','mmr_multi_suill_technician_c','mmr_multi_technician_shared','mmr_multi_technician_full','mmr_multi_technician_ch','mmr_multi_technician_gen','mmr_multi_technician_a','mmr_multi_technician_b','mmr_multi_technician_c','mmr_office_assistant_shared','mmr_office_assistant_full','mmr_office_assistant_ch','mmr_office_assistant_gen','mmr_office_assistant_a','mmr_office_assistant_b','mmr_office_assistant_c','mmr_office_attendant_shared','mmr_office_attendant_full','mmr_office_attendant_ch','mmr_office_attendant_gen','mmr_office_attendant_a','mmr_office_attendant_b','mmr_office_attendant_c','mmr_office_boy_shared','mmr_office_boy_full','mmr_office_boy_ch','mmr_office_boy_gen','mmr_office_boy_a','mmr_office_boy_b','mmr_office_boy_c','mmr_officer_shared','mmr_officer_full','mmr_officer_ch','mmr_officer_gen','mmr_officer_a','mmr_officer_b','mmr_officer_c','mmr_officer_security_shared','mmr_officer_security_full','mmr_officer_security_ch','mmr_officer_security_gen','mmr_officer_security_a','mmr_officer_security_b','mmr_officer_security_c','mmr_officer_training_shared','mmr_officer_training_full','mmr_officer_training_ch','mmr_officer_training_gen','mmr_officer_training_a','mmr_officer_training_b','mmr_officer_training_c','mmr_operator_ros_machine_shared','mmr_operator_ros_machine_full','mmr_operator_ros_machine_ch','mmr_operator_ros_machine_gen','mmr_operator_ros_machine_a','mmr_operator_ros_machine_b','mmr_operator_ros_machine_c','mmr_operator_stp_shared','mmr_operator_stp_full','mmr_operator_stp_ch','mmr_operator_stp_gen','mmr_operator_stp_a','mmr_operator_stp_b','mmr_operator_stp_c','mmr_painter_shared','mmr_painter_full','mmr_painter_ch','mmr_painter_gen','mmr_painter_a','mmr_painter_b','mmr_painter_c','mmr_plumber_shared','mmr_plumber_full','mmr_plumber_ch','mmr_plumber_gen','mmr_plumber_a','mmr_plumber_b','mmr_plumber_c','mmr_safety_steward_shared','mmr_safety_steward_full','mmr_safety_steward_ch','mmr_safety_steward_gen','mmr_safety_steward_a','mmr_safety_steward_b','mmr_safety_steward_c','mmr_security_guard_shared','mmr_security_guard_full','mmr_security_guard_ch','mmr_security_guard_gen','mmr_security_guard_a','mmr_security_guard_b','mmr_security_guard_c','mmr_security_supervisor_shared','mmr_security_supervisor_full','mmr_security_supervisor_ch','mmr_security_supervisor_gen','mmr_security_supervisor_a','mmr_security_supervisor_b','mmr_security_supervisor_c','mmr_sr_carpenter_shared','mmr_sr_carpenter_full','mmr_sr_carpenter_ch','mmr_sr_carpenter_gen','mmr_sr_carpenter_a','mmr_sr_carpenter_b','mmr_sr_carpenter_c','mmr_sr_exe_horticulture_shared','mmr_sr_exe_horticulture_full','mmr_sr_exe_horticulture_ch','mmr_sr_exe_horticulture_gen','mmr_sr_exe_horticulture_a','mmr_sr_exe_horticulture_b','mmr_sr_exe_horticulture_c','mmr_sr_engineer_facilities_shared','mmr_sr_engineer_facilities_full','mmr_sr_engineer_facilities_ch','mmr_sr_engineer_facilities_gen','mmr_sr_engineer_facilities_a','mmr_sr_engineer_facilities_b','mmr_sr_engineer_facilities_c','mmr_sr_executive_accounts_shared','mmr_sr_executive_accounts_full','mmr_sr_executive_accounts_ch','mmr_sr_executive_accounts_gen','mmr_sr_executive_accounts_a','mmr_sr_executive_accounts_b','mmr_sr_executive_accounts_c','mmr_sr_executive_pms_shared','mmr_sr_executive_pms_full','mmr_sr_executive_pms_ch','mmr_sr_executive_pms_gen','mmr_sr_executive_pms_a','mmr_sr_executive_pms_b','mmr_sr_executive_pms_c','mmr_sr_lady_sup_security_shared','mmr_sr_lady_sup_security_full','mmr_sr_lady_sup_security_ch','mmr_sr_lady_sup_security_gen','mmr_sr_lady_sup_security_a','mmr_sr_lady_sup_security_b','mmr_sr_lady_sup_security_c','mmr_sr_manager_facilities_shared','mmr_sr_manager_facilities_full','mmr_sr_manager_facilities_ch','mmr_sr_manager_facilities_gen','mmr_sr_manager_facilities_a','mmr_sr_manager_facilities_b','mmr_sr_manager_facilities_c','mmr_sr_officer_safety_shared','mmr_sr_officer_safety_full','mmr_sr_officer_safety_ch','mmr_sr_officer_safety_gen','mmr_sr_officer_safety_a','mmr_sr_officer_safety_b','mmr_sr_officer_safety_c','mmr_sr_officer_stores_shared','mmr_sr_officer_stores_full','mmr_sr_officer_stores_ch','mmr_sr_officer_stores_gen','mmr_sr_officer_stores_a','mmr_sr_officer_stores_b','mmr_sr_officer_stores_c','mmr_sr_supervisor_shared','mmr_sr_supervisor_full','mmr_sr_supervisor_ch','mmr_sr_supervisor_gen','mmr_sr_supervisor_a','mmr_sr_supervisor_b','mmr_sr_supervisor_c','mmr_sr_supervisor_hk_shared','mmr_sr_supervisor_hk_full','mmr_sr_supervisor_hk_ch','mmr_sr_supervisor_hk_gen','mmr_sr_supervisor_hk_a','mmr_sr_supervisor_hk_b','mmr_sr_supervisor_hk_c','mmr_sr_supervisor_plumbing_shared','mmr_sr_supervisor_plumbing_full','mmr_sr_supervisor_plumbing_ch','mmr_sr_supervisor_plumbing_gen','mmr_sr_supervisor_plumbing_a','mmr_sr_supervisor_plumbing_b','mmr_sr_supervisor_plumbing_c','mmr_sr_supervisor_security_shared','mmr_sr_supervisor_security_full','mmr_sr_supervisor_security_ch','mmr_sr_supervisor_security_gen','mmr_sr_supervisor_security_a','mmr_sr_supervisor_security_b','mmr_sr_supervisor_security_c','mmr_sr_technician_shared','mmr_sr_technician_full','mmr_sr_technician_ch','mmr_sr_technician_gen','mmr_sr_technician_a','mmr_sr_technician_b','mmr_sr_technician_c','mmr_srasst_help_desk_shared','mmr_srasst_help_desk_full','mmr_srasst_help_desk_ch','mmr_srasst_help_desk_gen','mmr_srasst_help_desk_a','mmr_srasst_help_desk_b','mmr_srasst_help_desk_c','mmr_sr_executive_reso_train_shared','mmr_sr_executive_reso_train_full','mmr_sr_executive_reso_train_ch','mmr_sr_executive_reso_train_gen','mmr_sr_executive_reso_train_a','mmr_sr_executive_reso_train_b','mmr_sr_executive_reso_train_c','mmr_sr_manager_shared','mmr_sr_manager_full','mmr_sr_manager_ch','mmr_sr_manager_gen','mmr_sr_manager_a','mmr_sr_manager_b','mmr_sr_manager_c','mmr_sr_office_assistant_shared','mmr_sr_office_assistant_full','mmr_sr_office_assistant_ch','mmr_sr_office_assistant_gen','mmr_sr_office_assistant_a','mmr_sr_office_assistant_b','mmr_sr_office_assistant_c','mmr_sr_officer_irrigation_shared','mmr_sr_officer_irrigation_full','mmr_sr_officer_irrigation_ch','mmr_sr_officer_irrigation_gen','mmr_sr_officer_irrigation_a','mmr_sr_officer_irrigation_b','mmr_sr_officer_irrigation_c','mmr_sr_officer_sec_train_shared','mmr_sr_officer_sec_train_full','mmr_sr_officer_sec_train_ch','mmr_sr_officer_sec_train_gen','mmr_sr_officer_sec_train_a','mmr_sr_officer_sec_train_b','mmr_sr_officer_sec_train_c','mmr_sr_officer_horticulture_shared','mmr_sr_officer_horticulture_full','mmr_sr_officer_horticulture_ch','mmr_sr_officer_horticulture_gen','mmr_sr_officer_horticulture_a','mmr_sr_officer_horticulture_b','mmr_sr_officer_horticulture_c','mmr_sr_officer_security_shared','mmr_sr_officer_security_full','mmr_sr_officer_security_ch','mmr_sr_officer_security_gen','mmr_sr_officer_security_a','mmr_sr_officer_security_b','mmr_sr_officer_security_c','mmr_sr_plumber_shared','mmr_sr_plumber_full','mmr_sr_plumber_ch','mmr_sr_plumber_gen','mmr_sr_plumber_a','mmr_sr_plumber_b','mmr_sr_plumber_c','mmr_sr_supervisor_pms_shared','mmr_sr_supervisor_pms_full','mmr_sr_supervisor_pms_ch','mmr_sr_supervisor_pms_gen','mmr_sr_supervisor_pms_a','mmr_sr_supervisor_pms_b','mmr_sr_supervisor_pms_c','mmr_sr_supervisor_tech_shared','mmr_sr_supervisor_tech_full','mmr_sr_supervisor_tech_ch','mmr_sr_supervisor_tech_gen','mmr_sr_supervisor_tech_a','mmr_sr_supervisor_tech_b','mmr_sr_supervisor_tech_c','mmr_steward_fire_safety_shared','mmr_steward_fire_safety_full','mmr_steward_fire_safety_ch','mmr_steward_fire_safety_gen','mmr_steward_fire_safety_a','mmr_steward_fire_safety_b','mmr_steward_fire_safety_c','mmr_supervisor_shared','mmr_supervisor_full','mmr_supervisor_ch','mmr_supervisor_gen','mmr_supervisor_a','mmr_supervisor_b','mmr_supervisor_c','mmr_supervisor_facilities_shared','mmr_supervisor_facilities_full','mmr_supervisor_facilities_ch','mmr_supervisor_facilities_gen','mmr_supervisor_facilities_a','mmr_supervisor_facilities_b','mmr_supervisor_facilities_c','mmr_supervisor_firesafety_shared','mmr_supervisor_firesafety_full','mmr_supervisor_firesafety_ch','mmr_supervisor_firesafety_gen','mmr_supervisor_firesafety_a','mmr_supervisor_firesafety_b','mmr_supervisor_firesafety_c','mmr_supervisor_gardening_shared','mmr_supervisor_gardening_full','mmr_supervisor_gardening_ch','mmr_supervisor_gardening_gen','mmr_supervisor_gardening_a','mmr_supervisor_gardening_b','mmr_supervisor_gardening_c','mmr_supervisor_hk_shared','mmr_supervisor_hk_full','mmr_supervisor_hk_ch','mmr_supervisor_hk_gen','mmr_supervisor_hk_a','mmr_supervisor_hk_b','mmr_supervisor_hk_c','mmr_supervisor_maintenance_shared','mmr_supervisor_maintenance_full','mmr_supervisor_maintenance_ch','mmr_supervisor_maintenance_gen','mmr_supervisor_maintenance_a','mmr_supervisor_maintenance_b','mmr_supervisor_maintenance_c','mmr_supervisor_plumbing_shared','mmr_supervisor_plumbing_full','mmr_supervisor_plumbing_ch','mmr_supervisor_plumbing_gen','mmr_supervisor_plumbing_a','mmr_supervisor_plumbing_b','mmr_supervisor_plumbing_c','mmr_supervisor_security_shared','mmr_supervisor_security_full','mmr_supervisor_security_ch','mmr_supervisor_security_gen','mmr_supervisor_security_a','mmr_supervisor_security_b','mmr_supervisor_security_c','mmr_supervisor_technical_shared','mmr_supervisor_technical_full','mmr_supervisor_technical_ch','mmr_supervisor_technical_gen','mmr_supervisor_technical_a','mmr_supervisor_technical_b','mmr_supervisor_technical_c','mmr_supervisor_clubhouse_shared','mmr_supervisor_clubhouse_full','mmr_supervisor_clubhouse_ch','mmr_supervisor_clubhouse_gen','mmr_supervisor_clubhouse_a','mmr_supervisor_clubhouse_b','mmr_supervisor_clubhouse_c','mmr_supervisor_horticulture_shared','mmr_supervisor_horticulture_full','mmr_supervisor_horticulture_ch','mmr_supervisor_horticulture_gen','mmr_supervisor_horticulture_a','mmr_supervisor_horticulture_b','mmr_supervisor_horticulture_c','mmr_supervisor_stp_shared','mmr_supervisor_stp_full','mmr_supervisor_stp_ch','mmr_supervisor_stp_gen','mmr_supervisor_stp_a','mmr_supervisor_stp_b','mmr_supervisor_stp_c','mmr_swimming_coach_shared','mmr_swimming_coach_full','mmr_swimming_coach_ch','mmr_swimming_coach_gen','mmr_swimming_coach_a','mmr_swimming_coach_b','mmr_swimming_coach_c','mmr_swimming_pool_operator_shared','mmr_swimming_pool_operator_full','mmr_swimming_pool_operator_ch','mmr_swimming_pool_operator_gen','mmr_swimming_pool_operator_a','mmr_swimming_pool_operator_b','mmr_swimming_pool_operator_c','mmr_swimming_pool_tech_shared','mmr_swimming_pool_tech_full','mmr_swimming_pool_tech_ch','mmr_swimming_pool_tech_gen','mmr_swimming_pool_tech_a','mmr_swimming_pool_tech_b','mmr_swimming_pool_tech_c','mmr_technician_shared','mmr_technician_full','mmr_technician_ch','mmr_technician_gen','mmr_technician_a','mmr_technician_b','mmr_technician_c','mmr_tennis_coach_shared','mmr_tennis_coach_full','mmr_tennis_coach_ch','mmr_tennis_coach_gen','mmr_tennis_coach_a','mmr_tennis_coach_b','mmr_tennis_coach_c','mmr_tr_mst_shared','mmr_tr_mst_full','mmr_tr_mst_ch','mmr_tr_mst_gen','mmr_tr_mst_a','mmr_tr_mst_b','mmr_tr_mst_c','mmr_tr_sup_fire_safety_shared','mmr_tr_sup_fire_safety_full','mmr_tr_sup_fire_safety_ch','mmr_tr_sup_fire_safety_gen','mmr_tr_sup_fire_safety_a','mmr_tr_sup_fire_safety_b','mmr_tr_sup_fire_safety_c','mmr_tr_assistant_stores_shared','mmr_tr_assistant_stores_full','mmr_tr_assistant_stores_ch','mmr_tr_assistant_stores_gen','mmr_tr_assistant_stores_a','mmr_tr_assistant_stores_b','mmr_tr_assistant_stores_c','mmr_tractor_driver_shared','mmr_tractor_driver_full','mmr_tractor_driver_ch','mmr_tractor_driver_gen','mmr_tractor_driver_a','mmr_tractor_driver_b','mmr_tractor_driver_c','mmr_vp_operations_shared','mmr_vp_operations_full','mmr_vp_operations_ch','mmr_vp_operations_gen','mmr_vp_operations_a','mmr_vp_operations_b','mmr_vp_operations_c','mmr_welder_shared','mmr_welder_full','mmr_welder_ch','mmr_welder_gen','mmr_welder_a','mmr_welder_b','mmr_welder_c','mmr_incharge_facilities_shared','mmr_incharge_facilities_full','mmr_incharge_facilities_ch','mmr_incharge_facilities_gen','mmr_incharge_facilities_a','mmr_incharge_facilities_b','mmr_incharge_facilities_c','mmr_incharge_fms_shared','mmr_incharge_fms_full','mmr_incharge_fms_ch','mmr_incharge_fms_gen','mmr_incharge_fms_a','mmr_incharge_fms_b','mmr_incharge_fms_c','mmr_incharge_pms_shared','mmr_incharge_pms_full','mmr_incharge_pms_ch','mmr_incharge_pms_gen','mmr_incharge_pms_a','mmr_incharge_pms_b','mmr_incharge_pms_c'];

      

    public static function boot()

    {

        parent::boot();  

 

        Manpowervalidation::observe(new \App\Observers\UserActionsObserver);

    }



     

    /**

     * Set to null if empty

     * @param $input

     */

   

}

