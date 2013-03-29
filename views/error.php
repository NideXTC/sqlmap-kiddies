<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo '[DEBUG]'.NAME; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" media="screen" type="text/css" href="./resources/css/error.css" />
</head>

<body>

    <div id="error">
        <h1><?php echo '[DEBUG] '.NAME; ?></h1>
		<h2>Oups! X(</h2>

        <table class="dataGrid">
            <tr>
                <th>Message:</th>
                <td><?php echo $exception->getMessage(); ?></td>
            </tr>

            <tr>
                <th>Path:</th>
                <td><?php echo PATH; ?></td>
            </tr>

            <tr>
                <th>File:</th>
                <td><?php echo str_replace(PATH, '', $exception->getFile()); ?></td>
            </tr>

            <tr>
                <th>Line:</th>
                <td><?php echo $exception->getLine(); ?></td>
            </tr>
        </table>

        <div id="traceDiv">
            <table class="traceGrid">

                <thead>
                    <tr>
                        <th style="width: 50%">File</th>
                        <th>Function</th>
                        <th style="width: 10%">Line</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($exception->getTrace() as $trace) { ?>

                    <tr>
                        <td><?php echo str_replace(PATH, '', $trace['file']); ?></td>
                        <td class="center"><?php echo $trace['function']; ?></td>
                        <td class="center"><?php echo $trace['line']; ?></td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>