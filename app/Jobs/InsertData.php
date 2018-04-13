<?php

namespace App\Jobs;

use App\Employee;
use App\OriginData;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class InsertData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    /**
     * 任务最大尝试次数。
     *
     * @var int
     */
    public $tries = 3;

    /**
     * 任务运行的超时时间。
     *
     * @var int
     */
    public $timeout = 60;

    public $sleep = 1;


    protected $uuid;

    public function __construct($uuid)
    {
        //
        $this->uuid = $uuid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = OriginData::where('uuid',$this->uuid)->first();
//        print_r($data->toArray());
//        exit();
//        echo $data->name;
//        $data->delete();
//        $data->name = 'test';
//        echo 1;
//        if ($data->save() == false) echo false;
//        echo 2;
        $employee = new Employee();
        $employee->name = $data->name;
        $employee->age = $data->age;
        $employee->sex = $data->sex;
        $employee->save();
    }

    public function failed(Exception $exception)
    {
       echo 'faild';
    }
}
