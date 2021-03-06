<?php
	class Measurement extends Model
    {

        public function __construct($table)
        {
            parent::__construct($table);
        }

		public function getMeasurementByID($pr_id){
			$measurement_details =  $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$pr_id]));

			$measurements = array();
			
			if(count($measurement_details)!=null){
				foreach ($measurement_details as $measurement) {
					array_push($measurements, $measurement->name);
				}
			}
			return $measurements;
		}


        public function getMeasurementForTView($p_id)
        {
            $measurement_details = $this->find(array('conditions' => 'product_id = ?', 'bind' => [$p_id]));

            return $measurement_details;
        }

        public function addNewMeasurement($pr_id, $customer_id, $types, $measurements)
        {

            // dnd($types);

            for ($i = 0; $i < count($types); $i++) {
                $fields = [
                    'product_id' => $pr_id,
                    'customer_id' => $customer_id,
                    'measurement_type' => $types[$i],
                    'measurement' => $measurements[$i]
                ];
            $this->insert($fields);
            }
        }

		public function deleteAllMeasurement($pr_id){
			$condition=['conditions'=>'product_id = ?', 'bind'=>[$pr_id]];
			$measurements=$this->find($condition);
			$ids=[];
			foreach ($measurements as $measurement){
				$this->delete($measurement->id);
			}
		}

        public function updateMeasurement($pr_id, $customer_id, $types, $measurements)
        {

            $old_measurement = $this->find(['conditions' => 'product_id', 'bind' => [$pr_id]]);
            for ($i = 0; $i < count($old_measurement); $i++) {
                $this->deleteMeasurement($old_measurement[$i]->id);
            }

            for ($i = 0; $i < count($types); $i++) {
                $fields = [
                    'product_id' => $pr_id,
                    'customer_id' => $customer_id,
                    'measurement_type' => $types[$i],
                    'measurement' => $measurements[$i]
                ];

                $this->insert($fields);
            }
        }

        public function deleteMeasurement($m_id)
        {
            $this->delete($m_id);
        }

        public function addMesurement($p_id, $arry)
        {
            if ($arry != null) {
                foreach ($arry as $mes) {
                    $fields = [
                        "product_id" => $p_id,
                        "name" => $mes
                    ];
                    $this->insert($fields);
                }
            }

        }

        public function editMesurement($p_id, $arry)
        {
            $this->deleteMeasurements($p_id);
            $this->addMesurement($p_id, $arry);

        }

        public function deleteMeasurements($pr_id)
        {
            $measurements = $this->find(array('conditions' => 'product_id = ?', 'bind' => [$pr_id]));
//            dnd($measurements);
            if (count($measurements) != null) {
                foreach ($measurements as $mes) {
                    $id = $mes->id;
                    $this->delete($id);
                }
            }

        }

        public function deleteMeasurement_by_customerID($u_id){
            $measurements = $this->find(array('conditions' => 'customer_id = ?', 'bind' => [$u_id]));

            if (count($measurements) != null) {
                foreach ($measurements as $mes) {
                    $id = $mes->id;
                    $this->delete($id);
                }
            }
        }


    }
