<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ZipArchive;

class UpdateMergeController extends Controller
{
    private $purchase_code;

    private $api_url = 'https://api.themes-coder.com';

    public function get_updates()
    {
        $get_version = Setting::where('key', 'version')->pluck('value');

        if (isset($_GET['purchase_code']) != '') {
            $this->purchase_code = $_GET['purchase_code'];
            $version = $get_version[0];
            $get_updates = file_get_contents($this->api_url.'/api2.php?code='.$this->purchase_code.'&version='.$version.'&requestTo=check_updates');

            $decode_zips = json_decode($get_updates, true);

            if ($decode_zips == '' || $decode_zips == null) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Purchase Code',
                ]);
            }

            $zip_count = '';
            $latest_version_zip = [];

            foreach ($decode_zips['zips'] as $zip) {
                if (basename($zip) > $version) {
                    $zip_count++;
                    $latest_version_zip[] = $zip;
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Updates get successfully',
                'data' => $latest_version_zip,
                'total_updates' => $zip_count,
            ]);

        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }

    public function download_zip()
    {
        // return $_GET['file_version'];

        if (isset($_GET['file_version']) && isset($_GET['purchase_code']) != '') {
            $version = $_GET['file_version'];
            $this->purchase_code = $_GET['purchase_code'];

            $output_filename = 'updates/update.zip';

            $host = $this->api_url.'/api2.php?code='.$this->purchase_code.'&file_version='.$version.'&requestTo=download';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $host);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_AUTOREFERER, false);
            curl_setopt($ch, CURLOPT_REFERER, 'http://www.xcontest.org');
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $result = curl_exec($ch);
            curl_close($ch);

            // print_r($result); // prints the contents of the collected file before writing..

            // the following lines write the contents to a file in the same directory (provided permissions etc)
            $fp = fopen($output_filename, 'w');
            fwrite($fp, $result);
            fclose($fp);

            $zip = new ZipArchive;
            $res = $zip->open($output_filename);
            if ($res === true) {
                $zip->extractTo('updates/');
                $zip->close();
                unlink($output_filename);
                // echo 'koot';
            } else {
                echo 'something went wrong';
            }

            if ($zip) {
                $source_path = 'updates/database.sql';
                $db_execute = DB::unprepared(file_get_contents($source_path));
                if ($db_execute) {
                    unlink('updates/database.sql');
                    $zip = new ZipArchive;
                    $res = $zip->open('updates/source_code.zip');
                    if ($res === true) {
                        $zip->extractTo('../');
                        $zip->close();
                        unlink('updates/source_code.zip');
                        DB::table('settings')->where('key', 'version')->update([
                            'value' => $version,
                        ]);

                        return response()->json([
                            'status' => 'success',
                            'message' => 'Updated successfully',
                        ]);
                    } else {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Something went wrong',
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Database did not execute',
                    ]);
                }
            }
        }
    }

    public function merge()
    {
        // return  $_GET['merge_request'];
        if (isset($_GET['merge_request']) && isset($_GET['purchase_code']) != '') {
            $merge_request = $_GET['merge_request'];
            $this->purchase_code = $_GET['purchase_code'];

            $output_filename = 'merge/merge.zip';

            $destination = public_path('merge/');
            if (! file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            if ($merge_request == 'web') {
                $host = $this->api_url.'/api2.php?code='.$this->purchase_code.'&requestTo=mergeweb';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $host);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_AUTOREFERER, false);
                curl_setopt($ch, CURLOPT_REFERER, 'http://www.xcontest.org');
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                curl_close($ch);

                // print_r($result); // prints the contents of the collected file before writing..

                // the following lines write the contents to a file in the same directory (provided permissions etc)
                $fp = fopen($output_filename, 'w');
                fwrite($fp, $result);
                fclose($fp);

                $zip = new ZipArchive;
                $res = $zip->open($output_filename);
                if ($res === true) {
                    $zip->extractTo('../');
                    $zip->close();
                    unlink($output_filename);
                    DB::table('settings')->where('key', 'is_web_purchased')->update([
                        'value' => 1,
                    ]);

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Web Merge successfully',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid Purchase Code',
                    ]);
                }
            }

            if ($merge_request == 'app') {
                $host = $this->api_url.'/api2.php?code='.$this->purchase_code.'&requestTo=mergemobile';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $host);
                curl_setopt($ch, CURLOPT_VERBOSE, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_AUTOREFERER, false);
                curl_setopt($ch, CURLOPT_REFERER, 'http://www.xcontest.org');
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                $result = curl_exec($ch);
                curl_close($ch);

                // return($result); // prints the contents of the collected file before writing..

                if ($result == 'invalid code') {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Invalid Purchase Code',
                    ]);
                } else {
                    // the following lines write the contents to a file in the same directory (provided permissions etc)
                    $fp = fopen($output_filename, 'w');
                    fwrite($fp, $result);
                    fclose($fp);
                    unlink($output_filename);
                    DB::table('settings')->where('key', 'is_app_purchased')->update([
                        'value' => 1,
                    ]);

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Mobile App Merge successfully',
                    ]);
                }
            }
        }
    }
}
