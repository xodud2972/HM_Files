<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * 클래스 베이스 컨트롤러
 *
 * BaseController는 구성 요소를 로드하기 위한 편리한 장소를 제공합니다.
 * 모든 컨트롤러에 필요한 기능을 수행합니다.
 * 새 컨트롤러에서 이 클래스를 확장합니다.
 * 클래스 홈은 BaseController를 확장합니다.
 *
 * 보안을 위해 모든 새 메서드는 protected 또는 private로 선언해야 합니다.
 */
class BaseController extends Controller
{
    /**
     * 기본 요청 객체의 인스턴스.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * 자동으로 로드될 도우미 배열
     * 클래스 인스턴스화. 이러한 도우미를 사용할 수 있습니다
     * BaseController를 확장하는 다른 모든 컨트롤러에 적용됩니다.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // 여기에서 모든 모델, 라이브러리 등을 미리 로드합니다.

        // E.g.: $this->session = \Config\Services::session();
    }
}
