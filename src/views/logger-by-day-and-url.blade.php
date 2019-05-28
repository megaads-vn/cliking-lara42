@extends('cliking-lara42::layout')
@section('content')

    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>Request Url</th>
                <th>Ip</th>
                <th>At</th>
                <th>User agent</th>
                <th>Referer</th>
            </tr>
            <?php
                $i = 1;
                foreach($accessGroup as $access) {
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $access->request_uri?></td>
                        <td><?= $access->ip ?></td>
                        <td><?= $access->created_at ?></td>
                        <td><?= $access->user_agent ?></td>
                        <td><?= $access->referer ?></td>
                    </tr>
                    <?php
                }
            ?>


        </table>
        <?= $accessGroup->links() ?>

    </div>

@endsection
