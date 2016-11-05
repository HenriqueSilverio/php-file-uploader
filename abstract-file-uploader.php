<?php

abstract class File_Uploader {

    protected $root = 'uploads';

    protected $files = array();

    protected $max_size = 1024 * 1024 * 2;

    protected $allowed_types = array( 'jpg', 'png' );

    protected $errors = array(
        'O arquivo enviado excede o limite definido na diretiva upload_max_filesize.',
        'O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML.',
        'O upload do arquivo foi feito parcialmente.',
        'Por favor, selecione um arquivo.'
    );

    public function __construct( $files ) {

        $this->files = $files;

    }

    abstract public function upload();

    protected function setup_directory() {

        $year  = date('Y');
        $month = date('m');
        $path  = $this->root . '/' . $year . '/' . $month;

        if ( false === is_dir( $path ) ) {

            mkdir( $path, 0777, true );

        }

        return $path;

    }

    protected function check_size( $file_size ) {

        $is_valid = false;

        if ( $file_size <= $this->max_size ) {

            $is_valid = true;

        }

        return $is_valid;

    }

    protected function check_extension( $file_name ) {

        $is_valid = false;

        $extension = pathinfo( $file_name, PATHINFO_EXTENSION );

        if ( in_array( $extension, $this->allowed_types ) ) {

            $is_valid = true;

        }

        return $is_valid;

    }

}
