<?php

declare(strict_types=1);
namespace OCA\Health\Controller;

use OCA\Health\Services\WeightdataService;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class WeightdataApiController extends ApiController {

	protected $userId;
	protected $weightdataService;

	public function __construct($appName, IRequest $request, WeightdataService $wS, $userId) {
		parent::__construct($appName, $request);
		$this->weightdataService = $wS;
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
		return new DataResponse($this->weightdataService->getAllByPersonId($personId));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $personId
	 * @param string $date
	 * @param null $weight
	 * @param null $measurement
	 * @param null $bodyfat
	 * @param null $waistSize
	 * @param null $hipSize
	 * @param null $musclePart
	 * @param string $comment
	 * @return DataResponse
	 */
	public function create(int $personId, string $date, $weight = null, $measurement = null, $bodyfat = null, $waistSize = null, $hipSize = null, $musclePart = null, string $comment = ''): DataResponse {
		return new DataResponse($this->weightdataService->create($personId, $weight, $measurement, $bodyfat, $date, $waistSize, $hipSize, $musclePart, $comment));
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
		return new DataResponse($this->weightdataService->delete($id));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 * @param string $date
	 * @param null $weight
	 * @param null $measurement
	 * @param null $bodyfat
	 * @param null $waistSize
	 * @param null $hipSize
	 * @param null $musclePart
	 * @param string $comment
	 * @return DataResponse
	 */
	public function update(int $id, string $date, $weight = null, $measurement = null, $bodyfat = null, $waistSize = null, $hipSize = null, $musclePart = null, string $comment = ''): DataResponse {
		return new DataResponse($this->weightdataService->update($id, $date, $weight, $measurement, $bodyfat, $waistSize, $hipSize, $musclePart, $comment));
	}
}