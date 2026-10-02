<?php $__env->startSection('title', __('Vaccination Card')); ?>
<?php $__env->startSection('page_title', __('Vaccination Card')); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto">

    <div class="flex justify-between items-center mb-4">
        <a href="<?php echo e(route('patient.appointments.index')); ?>" class="text-blue-600 hover:underline text-sm">
            ← <?php echo e(__('Back to My Appointments')); ?>

        </a>
        <button onclick="window.print()"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm flex items-center gap-2">
            🖨️ <?php echo e(__('Print Card')); ?>

        </button>
    </div>

    
    <div id="vaccine-card"
        class="bg-white border-2 border-gray-300 rounded-2xl p-8 print:shadow-none print:border-black" style="box-shadow: 0 8px 32px 0 rgba(6,95,70,0.12), 0 2px 8px 0 rgba(0,0,0,0.08);">

        
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-black text-gray-900 tracking-wide uppercase">
                    <?php echo e(__('National COVID-19 Vaccination Certificate')); ?>

                </h1>
                <p class="text-gray-500 text-sm mt-1 max-w-md">
                    <?php echo e(__('COVID-19 Vaccination Portal')); ?> — Pakistan
                </p>
            </div>
            
            <div class="border-2 border-gray-900 rounded-full w-16 h-16 flex items-center justify-center flex-shrink-0 ml-4">
                <svg class="w-10 h-10 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zm-2 10h-4v4h-2v-4H7v-2h4V7h2v4h4v2z"/>
                </svg>
            </div>
        </div>

        
        <div class="border-t border-gray-300 pt-4 mb-4">
            <div class="grid grid-cols-2 gap-0">
                <div class="border-b border-gray-300 pb-3 pr-6">
                    <p class="text-xs text-gray-500 mb-1">Last Name</p>
                    <?php
                        $nameParts = explode(' ', $appointment->patient->name, 2);
                        $lastName  = $nameParts[1] ?? '';
                        $firstName = $nameParts[0] ?? $appointment->patient->name;
                    ?>
                    <p class="text-base font-semibold text-gray-900 border-b border-gray-400 pb-1">
                        <?php echo e(strtoupper($lastName ?: $firstName)); ?>

                    </p>
                </div>
                <div class="border-b border-gray-300 pb-3 pl-6">
                    <p class="text-xs text-gray-500 mb-1">First Name</p>
                    <p class="text-base font-semibold text-gray-900 border-b border-gray-400 pb-1">
                        <?php echo e(strtoupper($firstName)); ?>

                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-0 mt-4">
                <div class="pr-6">
                    <p class="text-xs text-gray-500 mb-1"><?php echo e(__('Date of Birth')); ?></p>
                    <p class="text-sm font-semibold text-gray-900 border-b border-gray-400 pb-1">
                        <?php echo e($appointment->patient->patientProfile->dob ?? 'N/A'); ?>

                    </p>
                </div>
                <div class="pl-6">
                    <p class="text-xs text-gray-500 mb-1"><?php echo e(__('Hospital')); ?></p>
                    <p class="text-sm font-semibold text-gray-900 border-b border-gray-400 pb-1">
                        <?php echo e($appointment->hospital->hospitalProfile->hospital_name ?? 'N/A'); ?>

                    </p>
                </div>
            </div>
        </div>

        
        <table class="w-full border-collapse border border-gray-900 mt-4 text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-900 px-3 py-2 text-left font-bold text-gray-800 w-32"><?php echo e(__('Vaccine')); ?></th>
                    <th class="border border-gray-900 px-3 py-2 text-left font-bold text-gray-800"><?php echo e(__('Vaccine Name')); ?></th>
                    <th class="border border-gray-900 px-3 py-2 text-left font-bold text-gray-800 w-36"><?php echo e(__('Vaccination Date')); ?></th>
                    <th class="border border-gray-900 px-3 py-2 text-left font-bold text-gray-800"><?php echo e(__('Hospital')); ?></th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td class="border border-gray-900 px-3 py-3 text-xs text-center">
                        <p class="font-semibold"><?php echo e(convertToUrduNumerals(1)); ?><sup>st</sup> <?php echo e(__('Dose Number')); ?></p>
                        <p class="font-semibold">COVID-19</p>
                    </td>
                    <td class="border border-gray-900 px-3 py-3 text-gray-800">
                        <?php if($appointment->vaccination && $appointment->vaccination->dose_number == 1): ?>
                            <?php echo e($appointment->vaccine->name ?? ''); ?>

                            <br><span class="text-xs text-gray-500"><?php echo e($appointment->vaccine->manufacturer ?? ''); ?></span>
                        <?php elseif($appointment->vaccination): ?>
                            <?php echo e($appointment->vaccine->name ?? ''); ?>

                        <?php endif; ?>
                    </td>
                    <td class="border border-gray-900 px-3 py-3 text-gray-700 text-xs">
                        <?php if($appointment->vaccination && $appointment->vaccination->dose_number == 1): ?>
                            <?php echo e(\Carbon\Carbon::parse($appointment->vaccination->vaccination_date)->format('m / d / y')); ?>

                        <?php else: ?>
                            <span class="text-gray-400">__ / __ / __</span>
                        <?php endif; ?>
                    </td>
                    <td class="border border-gray-900 px-3 py-3 text-gray-700 text-xs">
                        <?php if($appointment->vaccination && $appointment->vaccination->dose_number == 1): ?>
                            <?php echo e($appointment->hospital->hospitalProfile->hospital_name ?? ''); ?>

                            <br><span class="text-gray-400">Batch: <?php echo e($appointment->vaccination->batch_no); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>

                
                <tr>
                    <td class="border border-gray-900 px-3 py-3 text-xs text-center">
                        <p class="font-semibold"><?php echo e(convertToUrduNumerals(2)); ?><sup>nd</sup> <?php echo e(__('Dose Number')); ?></p>
                        <p class="font-semibold">COVID-19</p>
                    </td>
                    <td class="border border-gray-900 px-3 py-3 text-gray-800">
                        <?php if($appointment->vaccination && $appointment->vaccination->dose_number == 2): ?>
                            <?php echo e($appointment->vaccine->name ?? ''); ?>

                        <?php endif; ?>
                    </td>
                    <td class="border border-gray-900 px-3 py-3 text-gray-700 text-xs">
                        <?php if($appointment->vaccination && $appointment->vaccination->dose_number == 2): ?>
                            <?php echo e(\Carbon\Carbon::parse($appointment->vaccination->vaccination_date)->format('m / d / y')); ?>

                        <?php else: ?>
                            <span class="text-gray-400">__ / __ / __</span>
                        <?php endif; ?>
                    </td>
                    <td class="border border-gray-900 px-3 py-3 text-gray-700 text-xs">
                        <?php if($appointment->vaccination && $appointment->vaccination->dose_number == 2): ?>
                            <?php echo e($appointment->hospital->hospitalProfile->hospital_name ?? ''); ?>

                            <br><span class="text-gray-400">Batch: <?php echo e($appointment->vaccination->batch_no); ?></span>
                        <?php endif; ?>
                    </td>
                </tr>

                
                <tr>
                    <td class="border border-gray-900 px-3 py-3 text-xs text-center font-semibold">Other</td>
                    <td class="border border-gray-900 px-3 py-3"></td>
                    <td class="border border-gray-900 px-3 py-3 text-gray-400 text-xs">__ / __ / __</td>
                    <td class="border border-gray-900 px-3 py-3 relative">
                        
                        <?php if($appointment->vaccination): ?>
                        <div class="absolute bottom-1 right-1 w-20 h-20 flex items-center justify-center"
                            style="opacity:0.85;">
                            <div class="relative w-20 h-20">
                                <svg viewBox="0 0 100 100" class="w-full h-full">
                                    <circle cx="50" cy="50" r="46" fill="none" stroke="#1e3a8a" stroke-width="4"/>
                                    <circle cx="50" cy="50" r="38" fill="#1d4ed8"/>
                                    <path d="M30 52 L44 66 L70 38" stroke="white" stroke-width="7" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path id="topArc" d="M18,50 A32,32 0 0,1 82,50" fill="none"/>
                                    <text font-size="10" font-weight="bold" fill="#1e3a8a" font-family="Arial">
                                        <textPath href="#topArc" startOffset="5%">★ COVID-19 ★ VACCINATED</textPath>
                                    </text>
                                </svg>
                            </div>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <div class="mt-4 grid grid-cols-2 gap-4 text-xs text-gray-600 border-t pt-3">
            <div>
                <p><span class="font-semibold">CNIC:</span> <?php echo e($appointment->patient->patientProfile->cnic ?? 'N/A'); ?></p>
                <p><span class="font-semibold"><?php echo e(__('Phone')); ?>:</span> <?php echo e($appointment->patient->patientProfile->phone ?? 'N/A'); ?></p>
            </div>
            <div class="text-right">
                <p><span class="font-semibold"><?php echo e(__('Hospital')); ?>:</span> <?php echo e($appointment->hospital->hospitalProfile->hospital_name ?? 'N/A'); ?></p>
                <p><span class="font-semibold"><?php echo e(__('City')); ?>:</span> <?php echo e($appointment->hospital->hospitalProfile->city ?? 'N/A'); ?></p>
                <p class="mt-1 text-gray-400"><?php echo e(__('Covid Vaccination Portal')); ?> — Pakistan</p>
            </div>
        </div>
    </div>
</div>


<style>
    @media print {
        body * { visibility: hidden; }
        #vaccine-card, #vaccine-card * { visibility: visible; }
        #vaccine-card { position: absolute; left: 0; top: 0; width: 100%; }
        .no-print { display: none; }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.patient', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/patient/vaccine-card.blade.php ENDPATH**/ ?>