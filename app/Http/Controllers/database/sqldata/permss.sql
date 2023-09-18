INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'annualquota.edit', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'annual quota', 'Edit Annual Quota ');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'annualquota.create', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'annual quota', 'Create Annual Quota ');


 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'request.annualquota.view', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'request for annual quota', 'View Annual Quota request ');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'request.annualquota.assign', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'request for annual quota', 'assign Annual Quota request ');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'substancerequest.view', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance imported requests', 'View Request for Import substance');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'substancerequest.reject', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance imported requests', 'reject Request for Import substance');
/* --------------------- */
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'equipmentrequest.check', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment imported requests', 'check Request for Import equipment');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'equipmentrequest.verify', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment imported requests', 'verify Request for Import equipment');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'equipmentrequest.approve', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment imported requests', 'approve Request for Import equipment');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'equipmentrequest.finalize', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment imported requests', 'finalize Request for Import equipment');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'equipmentrequest.view', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment imported requests', 'View Request for Import equipment');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'equipmentrequest.reject', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment imported requests', 'reject Request for Import equipment');

/* -------------------------- */

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'license.quota.view', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'license quota', 'view license quota');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'license.quota.download', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'license quota', 'download license quota');
/* -------------------------- */
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'license.substance.view', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'license substance', 'view license substance');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'license.substance.download', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'license substance', 'download license substance');

/* -------------------------- */
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'license.equipment.view', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'license equipment', 'view license equipment');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'license.equipment.download', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'license equipment', 'download license equipment');


INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.substance.substance', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance report', 'report by substance');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.substance.company', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance report', 'report by company');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.substance.port', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance report', 'report by Import port');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.substance.xcountry', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance report', 'report by export country');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.substance.mcountry', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance report', 'report by manufacture country');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.substance.purpose', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'substance report', 'report by purpose');


 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.equipment.company', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment report', 'report by company');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.equipment.port', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment report', 'report by Import port');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.equipment.xcountry', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment report', 'report by export country');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.equipment.mcountry', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment report', 'report by manufacture country');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'report.equipment.purpose', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'equipment report', 'report by purpose');


 
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'user.view', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'MOE user', 'view MOE user');

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'user.create', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'MOE user', 'create MOE user');

 INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `resourse`, `label`)
 VALUES (NULL, 'user.edit', 'web', '2019-11-30 00:00:00', '2019-04-09 08:48:58', 'MOE user', 'edit MOE user');
