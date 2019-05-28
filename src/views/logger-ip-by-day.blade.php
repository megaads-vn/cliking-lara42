@extends('cliking-lara42::layout')
@section('content')

    <div class="container">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="<?= URL::route('logger-day', ['day' => $day]) ?>">Logs by Ip</a></li>
            <li role="presentation"><a href="<?= URL::route('logger-url-day', ['day' => $day]) ?>">Logs by Url</a></li>
        </ul>
        <table class="table table-bordered" style="margin-top: 10px;">
            <tr>
                <th>#</th>
                <th>IP</th>
                <th>Count</th>
            </tr>
            <?php
                $i = 1;
                foreach($accessGroup as $access) {
                    $accessIp = $access->ip;
                    if ($accessIp == '::1') {
                        $accessIp = '1';
                    }
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td>
                            <a href="<?= URL::route('logger-ip', ['ip' => $accessIp, 'day' => $day]) ?>">
                                <?= $access->ip ?>
                            </a>
                        </td>
                        <td><?= $access->count ?></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
        <?= $accessGroup->links() ?>

    </div>

@endsection
