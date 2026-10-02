
<?php $__env->startSection('title', __('Admin Dashboard')); ?>
<?php $__env->startSection('page_title', __('Dashboard')); ?>
<?php $__env->startSection('content'); ?>
<div>
    <h1 class="text-2xl font-bold text-gray-800 mb-6"><?php echo e(__('Admin Dashboard')); ?></h1>
    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4" style="box-shadow: 0 4px 16px 0 rgba(0,0,0,0.15);"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4">
        <div class="bg-white rounded-2xl p-5 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-blue-600"><?php echo e(convertToUrduNumerals($totalPatients)); ?></p>
            <p class="text-gray-500 text-sm mt-1"><?php echo e(__('Total Patients')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-green-600"><?php echo e(convertToUrduNumerals($approvedHospitals)); ?></p>
            <p class="text-gray-500 text-sm mt-1"><?php echo e(__('Approved Hospitals')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-yellow-600"><?php echo e(convertToUrduNumerals($pendingHospitals)); ?></p>
            <p class="text-gray-500 text-sm mt-1"><?php echo e(__('Pending Hospitals')); ?></p>
        </div>
        <div class="bg-white rounded-2xl p-5 text-center" style="box-shadow: 0 6px 24px 0 rgba(0,0,0,0.16), 0 2px 8px 0 rgba(0,0,0,0.10);">
            <p class="text-3xl font-bold text-purple-600"><?php echo e(convertToUrduNumerals($totalBookings)); ?></p>
            <p class="text-gray-500 text-sm mt-1"><?php echo e(__('Total Bookings')); ?></p>
        </div>
    </div>

    
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <a href="<?php echo e(route('admin.hospitals')); ?>" class="bg-blue-600 text-white rounded-2xl p-4 text-center hover:bg-blue-700 transition" style="box-shadow: 0 8px 28px 0 rgba(0,0,0,0.22), 0 2px 8px 0 rgba(0,0,0,0.14);">
            <p class="text-base font-semibold"><?php echo e(__('View Hospitals')); ?></p>
            <p class="text-xs opacity-80 mt-0.5"><?php echo e(__('Approve / Reject')); ?></p>
        </a>
        <a href="<?php echo e(route('admin.patients.index')); ?>" class="bg-green-600 text-white rounded-2xl p-4 text-center hover:bg-green-700 transition" style="box-shadow: 0 8px 28px 0 rgba(0,0,0,0.22), 0 2px 8px 0 rgba(0,0,0,0.14);">
            <p class="text-base font-semibold"><?php echo e(__('View Patients')); ?></p>
            <p class="text-xs opacity-80 mt-0.5"><?php echo e(__('Patient profiles & appointments')); ?></p>
        </a>
        <a href="<?php echo e(route('admin.vaccines.index')); ?>" class="bg-purple-600 text-white rounded-2xl p-4 text-center hover:bg-purple-700 transition" style="box-shadow: 0 8px 28px 0 rgba(0,0,0,0.22), 0 2px 8px 0 rgba(0,0,0,0.14);">
            <p class="text-base font-semibold"><?php echo e(__('Manage Vaccines')); ?></p>
            <p class="text-xs opacity-80 mt-0.5"><?php echo e(__('Stock & availability')); ?></p>
        </a>
    </div>

    
    <div class="bg-white rounded-2xl p-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.10);">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-3">
            <div>
                <h2 class="text-lg font-bold text-gray-800">📈 COVID-19 Statistics</h2>
                <p class="text-gray-500 text-xs mt-0.5">Last 7 months overview</p>
            </div>
            
            <div class="flex flex-wrap gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <span class="w-4 h-1 rounded-full inline-block" style="background:#3b82f6;"></span>
                    <span class="text-gray-600">New Cases</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-1 rounded-full inline-block" style="background:#ef4444;"></span>
                    <span class="text-gray-600">Positive</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-4 h-1 rounded-full inline-block" style="background:#22c55e;"></span>
                    <span class="text-gray-600">Recovered</span>
                </div>
            </div>
        </div>
        <canvas id="covidChart" height="100"></canvas>
    </div>

    
    <div class="bg-white rounded-2xl p-6 mt-6" style="box-shadow: 0 8px 32px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.10);">
        <h2 class="text-lg font-bold text-gray-800 mb-4">⭐ <?php echo e(__('Patient Reviews')); ?></h2>

        <?php if($reviews->isEmpty()): ?>
            <div class="text-center py-10 text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <p class="text-sm"><?php echo e(__('No reviews yet')); ?></p>
            </div>
        <?php else: ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border border-gray-100 rounded-xl p-4" style="box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    <div class="flex items-start justify-between gap-3">
                        
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm flex-shrink-0">
                                <?php echo e(strtoupper(substr($review->user->name ?? 'P', 0, 1))); ?>

                            </div>
                            <div>
                                <p class="font-semibold text-gray-800 text-sm"><?php echo e($review->user->name ?? __('Unknown')); ?></p>
                                <p class="text-xs text-gray-400"><?php echo e($review->created_at->translatedFormat(app()->getLocale() === 'ur' ? 'd M Y، h:i A' : 'd M Y, h:i A')); ?></p>
                            </div>
                        </div>
                        
                        <div class="flex gap-0.5 flex-shrink-0">
                            <?php for($s = 1; $s <= 5; $s++): ?>
                                <span style="font-size:18px; color:<?php echo e($s <= $review->stars ? '#f59e0b' : '#d1d5db'); ?>;">&#9733;</span>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <?php if($review->message): ?>
                    <p class="text-gray-600 text-sm mt-3 leading-relaxed"><?php echo e($review->message); ?></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
(function() {
    var months    = <?php echo json_encode($months, 15, 512) ?>;
    var newCases  = <?php echo json_encode($newCases, 15, 512) ?>;
    var positive  = <?php echo json_encode($positiveCases, 15, 512) ?>;
    var recovered = <?php echo json_encode($recovered, 15, 512) ?>;

    var ctx = document.getElementById('covidChart').getContext('2d');

    function makeGradient(ctx, colorTop, colorBottom) {
        var g = ctx.createLinearGradient(0, 0, 0, 280);
        g.addColorStop(0, colorTop);
        g.addColorStop(1, colorBottom);
        return g;
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'New Cases',
                    data: newCases,
                    borderColor: '#3b82f6',
                    backgroundColor: makeGradient(ctx, 'rgba(59,130,246,0.18)', 'rgba(59,130,246,0.01)'),
                    borderWidth: 2.5,
                    pointBackgroundColor: '#3b82f6',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.4,
                    fill: true,
                },
                {
                    label: 'Positive',
                    data: positive,
                    borderColor: '#ef4444',
                    backgroundColor: makeGradient(ctx, 'rgba(239,68,68,0.14)', 'rgba(239,68,68,0.01)'),
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ef4444',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.4,
                    fill: true,
                },
                {
                    label: 'Recovered',
                    data: recovered,
                    borderColor: '#22c55e',
                    backgroundColor: makeGradient(ctx, 'rgba(34,197,94,0.14)', 'rgba(34,197,94,0.01)'),
                    borderWidth: 2.5,
                    pointBackgroundColor: '#22c55e',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.4,
                    fill: true,
                }
            ]
        },
        options: {
            responsive: true,
            interaction: { mode: 'index', intersect: false },
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(15,15,26,0.92)',
                    titleColor: '#f1f5f9',
                    bodyColor: '#cbd5e1',
                    padding: 12,
                    cornerRadius: 10,
                    callbacks: {
                        label: function(c) {
                            return '  ' + c.dataset.label + ': ' + c.parsed.y;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#64748b', font: { size: 11 } },
                    border: { display: false }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(100,116,139,0.10)' },
                    ticks: { color: '#64748b', font: { size: 11 }, precision: 0 },
                    border: { display: false }
                }
            }
        }
    });
})();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\PC\Downloads\14 july tue\14 july tue\covid19\resources\views/dashboards/admin.blade.php ENDPATH**/ ?>