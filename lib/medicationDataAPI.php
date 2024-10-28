<?php

declare(strict_types=1);
namespace OCA\Health\Controller;

use OCA\Health\Services\MedicationdataService;
use OCP\AppFramework\ApiController;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class MedicationdataApiController extends ApiController {

	protected $userId;
	protected $medicationdataService;

	public function __construct($appName, IRequest $request, MedicationdataService $mS, $userId) {
		parent::__construct($appName, $request);
		$this->medicationdataService = $mS;
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
	public function findPlanByPerson(int $personId): DataResponse {
		return new DataResponse($this->medicationdataService->getAllPlansByPersonId($personId));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $planId
	 * @return DataResponse
	 */
	public function findMedicationByPlan(int $planId): DataResponse {
		return new DataResponse($this->medicationdataService->getAllMedicationByPlan($planId));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $personId
	 * @param string $date
	 * @param string $comment
	 * @param bool $takeOver
	 * @return DataResponse
	 */
	public function createPlan(int $personId, string $date, string $comment = '', bool $takeOver = true): DataResponse {
		return new DataResponse($this->medicationdataService->createPlan($personId, $date, $comment, $takeOver));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $planId
	 * @param string $name
	 * @param string $identifier
	 * @param int|null $morning
	 * @param int|null $noon
	 * @param int|null $evening
	 * @param int|null $night
	 * @param string $comment
	 * @return DataResponse
	 */
	public function createMedication(int $planId, string $name, string $identifier, int $morning = null, int $noon = null, int $evening = null, int $night = null, string $comment = ''): DataResponse {
		return new DataResponse($this->medicationdataService->createMedication($planId, $name, $identifier, $morning, $noon, $evening, $night, $comment));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 * @return DataResponse
	 */
	public function deleteMedication(int $id): DataResponse {
		return new DataResponse($this->medicationdataService->deleteMedication($id));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 * @return DataResponse
	 */
	public function deletePlan(int $id): DataResponse {
		return new DataResponse($this->medicationdataService->deletePlan($id));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 * @param string $name
	 * @param string $identifier
	 * @param int|null $morning
	 * @param int|null $noon
	 * @param int|null $evening
	 * @param int|null $night
	 * @param string $comment
	 * @return DataResponse
	 */
	public function updateMedication(int $id, string $name, string $identifier, int $morning = null, int $noon = null, int $evening = null, int $night = null, string $comment = ''): DataResponse {
		return new DataResponse($this->medicationdataService->updateMedication($id, $name, $identifier, $morning, $noon, $evening, $night, $comment));
	}

	/**
	 * @NoAdminRequired
	 * @CORS
	 * @NoCSRFRequired
	 *
	 * @param int $id
	 * @param string $date
	 * @param string $comment
	 * @return DataResponse
	 */
	public function updatePlan(int $id, string $date, string $comment = ''): DataResponse {
		return new DataResponse($this->medicationdataService->updatePlan($id, $date, $comment));
	}
}