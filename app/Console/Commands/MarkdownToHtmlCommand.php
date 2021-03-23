<?php

namespace App\Console\Commands;

use App\Librarys\Generate\Parsedown;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MarkdownToHtmlCommand extends Command
{
    protected $files;
    protected $filePaths;

    /**
     * The name and signature of the console command. 控制台命令的名称和签名
     *
     * @var string
     */
    protected $signature = 'docs:markdownToHtml';

    /**
     * The console command description. 控制台命令描述
     *
     * @var string
     */
    protected $description = 'Data conversion from markdown format to html format';

    /**
     * Create a new command instance. 创建一个新的命令实例
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
        $this->filePaths = getDir(app_path().'/ApiDocs/Markdown');
    }

    /**
     * Execute the console command. 执行控制台命令
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {

        $parsedown = new Parsedown();
        foreach ($this->filePaths as $fileName){
            $markdownData = file_get_contents( $fileName);
            $filterMarkdownData = $this->filterConfig($markdownData);
            $htmlContent = $parsedown->text($filterMarkdownData);
            //DummyFieldRightNavigation
            $rightNavigation= $parsedown->getRightNavigation();

            // 获取 输出地址
            $path = $this->getPath($fileName);


            $stub = $this->files->get($this->getStub());
            // 替换模板
            $this->files->put($path, $this->buildHtml($htmlContent,$stub)->buildRightNavigation($rightNavigation,$stub));

            $this->info($path.' created successfully.');
        }

    }

    protected function getPath($path)
    {
        $start = strpos($path, 'Markdown')+9;
        $pathArr = explode('/',substr($path, $start));

        $pathDir = public_path().'/docs';
        for($p = 0;$p < count($pathArr)-1;$p++){
            $pathDir .= '/'.$pathArr[$p];
            $this->makeDirectory($pathDir);
        }
        $path = $pathDir.'/'.$pathArr[count($pathArr)-1];

        return str_replace('.md','.html',$path);
    }

    /**
     * Get the stub file for the generator. 获取生成器模板文件
     *
     * @return string
     */
    protected function getStub()
    {
        $stub = $stub ?? '/Stubs/ApiDocs/detail_html.plain.stub';

        return __DIR__.$stub;
    }


    protected function filterConfig($stub)
    {

        $substr = substr($stub, strpos($stub, '---')+3,strpos($stub, '---',1)-3);

        // 赋值配置文件

        //过滤
        return substr($stub,strlen($substr)+6);

    }

    protected function buildHtml($htmlContent,&$stub)
    {

        $stub =  str_replace('DummyFieldContent', $htmlContent, $stub);
        return $this;
    }

    protected function buildRightNavigation($RightNavigation,$stub)
    {
        return str_replace('DummyFieldRightNavigation', $RightNavigation, $stub);
    }




    /**
     * Build the directory for the class if necessary. 如果需要，为类构建目录
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
        return $path;
    }



    /**
     * Replace the class name for the given stub. 替换给定存根的类名
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass(&$stub, $name)
    {
        $class = str_replace($this->getNamespace($name).'\\', '', $name);

        $stub  = str_replace('DummyClass', $class, $stub);

        return $this;
    }

}
