import { TestBed } from '@angular/core/testing';

import { ReminderserviceService } from './reminderservice.service';

describe('ReminderserviceService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ReminderserviceService = TestBed.get(ReminderserviceService);
    expect(service).toBeTruthy();
  });
});
