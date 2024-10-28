<?php

declare(strict_types=1);
namespace OCA\Health\Controller;

use OCA\Health\Services\SmokingdataService;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class SmokingdataApiController extends ApiController {

	protected $userId;
	protected $smokingdataService;

	public function __construct($appName, IRequest $request, SmokingdataService $mS, $userId) {
		parent::__construct($appName, $request);
		$this->smokingdataService = $mS;
		$this->userId = $userId;
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $personId
	 * @return DataResponse
	 */
	public function findByPerson(int $personId): DataResponse {
		return new DataResponse($this->smokingdataService->getAllByPersonId($personId));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $personId
	 * @param string $date
	 * @param int|null $cigarettes
	 * @param int|null $desireLevel
	 * @param string $comment
	 * @return DataResponse
	 */
	public function create(int $personId, string $date, int $cigarettes = null, int $desireLevel = null, string $comment = ''): DataResponse {
		return new DataResponse($this->smokingdataService->create($personId, $date, $cigarettes, $desireLevel, $comment));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 * @return DataResponse
	 */
	public function delete(int $id): DataResponse {
		return new DataResponse($this->smokingdataService->delete($id));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 * @param string $date
	 * @param int|null $cigarettes
	 * @param int|null $desireLevel
	 * @param string $comment
	 * @return DataResponse
	 */
	public function update(int $id, string $date, int $cigarettes = null, int $desireLevel = null, string $comment = ''): DataResponse {
		return new DataResponse($this->smokingdataService->update($id, $date, $cigarettes, $desireLevel, $comment));
	}
}