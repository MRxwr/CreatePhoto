<div class="row mt-3"><div class="col-md-7"><h5><?php echo app('translator')->get('juzaweb::app.setting'); ?></h5> <?php $__env->startComponent('juzaweb::components.form', [
            'method' => 'post',
            'action' => route('admin.setting.email.save')
        ]); ?> <?php $__env->startComponent('juzaweb::components.form_input', [
                'label' => trans('juzaweb::app.email_host'),
                'name' => 'email[host]',
                'value' => $config['host'] ?? '',
            ]); ?><?php echo $__env->renderComponent(); ?><div class="row"><div class="col-md-6"><?php $__env->startComponent('juzaweb::components.form_input', [
                        'label' => trans('juzaweb::app.email_port'),
                        'name' => 'email[port]',
                        'value' => $config['port'] ?? '',
                    ]); ?><?php echo $__env->renderComponent(); ?></div><div class="col-md-6"><?php $__env->startComponent('juzaweb::components.form_select', [
                        'label' => trans('juzaweb::app.email_encryption'),
                        'name' => 'email[encryption]',
                        'value' => $config['encryption'] ?? '',
                        'options' => [
                            '' => 'none',
                            'tls' => 'tls',
                            'ssl' => 'ssl'
                        ],
                    ]); ?><?php echo $__env->renderComponent(); ?></div></div> <?php $__env->startComponent('juzaweb::components.form_input', [
                'label' => trans('juzaweb::app.email_username'),
                'name' => 'email[username]',
                'value' => $config['username'] ?? '',
            ]); ?><?php echo $__env->renderComponent(); ?> <?php $__env->startComponent('juzaweb::components.form_input', [
                'label' => trans('juzaweb::app.email_password'),
                'name' => 'email[password]',
                'value' => $config['password'] ?? '',
            ]); ?><?php echo $__env->renderComponent(); ?><hr> <?php $__env->startComponent('juzaweb::components.form_input', [
                'label' => trans('juzaweb::app.email_from_address'),
                'name' => 'email[from_address]',
                'value' => $config['from_address'] ?? '',
            ]); ?><?php echo $__env->renderComponent(); ?> <?php $__env->startComponent('juzaweb::components.form_input', [
                'label' => trans('juzaweb::app.email_from_name'),
                'name' => 'email[from_name]',
                'value' => $config['from_name'] ?? '',
            ]); ?><?php echo $__env->renderComponent(); ?><div class="mt-3"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo app('translator')->get('juzaweb::app.save'); ?> </button></div> <?php echo $__env->renderComponent(); ?></div><div class="col-md-5"><h5><?php echo app('translator')->get('juzaweb::app.send_email_test'); ?></h5> <?php $__env->startComponent('juzaweb::components.form', [
            'method' => 'post',
            'action' => route('admin.setting.email.test-email')
        ]); ?> <?php $__env->startComponent('juzaweb::components.form_input', [
                'label' => trans('juzaweb::app.email'),
                'name' => 'email',
                'required' => true,
            ]); ?><?php echo $__env->renderComponent(); ?> <button type="submit" class="btn btn-success"><i class="fa fa-send"></i> <?php echo app('translator')->get('juzaweb::app.send_email_test'); ?> </button> <?php echo $__env->renderComponent(); ?></div></div><?php /**PATH C:\wamp64\www\github\CreatePhoto\vendor\juzaweb\cms\src\Providers/../resources/views/backend/email/setting.blade.php ENDPATH**/ ?>